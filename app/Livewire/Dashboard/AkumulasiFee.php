<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Models\rekap_absensi;
use App\Models\Pendapatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class AkumulasiFee extends Component
{
    use WithFileUploads;

    public $search = '';
    public $rekaps = [];
    public $selectedRekapId = null;
    public $showCalculateModal = false;

    // For calculation
    public $toleransiMenit = 15;
    public $standarSesiMenit = 90; // Default
    public $feePerSesi = 0;
    public $feeRifayaPerSesi = 25000;

    public $calculatedActivities = [];
    
    public $totalDurationMinutes = 0;
    public $totalKelebihanMenit = 0;
    public $totalSesi = 0;

    public $totalBayarSesi = 0;
    public $totalBayarKelebihan = 0;
    public $totalFee = 0;

    public $totalRifayaSesi = 0;
    public $totalRifayaKelebihan = 0;

    public $pendapatanTutor = 0;

    // Status & Uploads
    public $statusPembayaran = 'draft';
    public $totalPembayaranOrtu = 0;
    public $fotoBuktiTf = null;
    public $fotoPembayaranOrtu = null;

    public $pendapatanApps = 0;
    public $rekapDetail = null;

    public function mount()
    {
        if (!Gate::allows('hasRole', [1,2])) {
            abort(401);
        }
        $this->loadRekaps();
    }

    public function updatedSearch()
    {
        $this->loadRekaps();
    }

    public function loadRekaps()
    {
        $query = rekap_absensi::with(['mapping.student', 'mapping.teacher', 'pendapatan']);
        
        if (!in_array(1, auth()->user()->roles->pluck('id')->toArray())) {
            $query->where('teacher_id', auth()->user()->id);
        }

        if (!empty($this->search)) {
            $search = strtolower($this->search);
            $query->where(function ($q) use ($search) {
                $q->whereHas('mapping.student', function ($q2) use ($search) {
                    $q2->whereRaw('LOWER(name) like ?', ["%{$search}%"]);
                })->orWhereHas('mapping.teacher', function ($q2) use ($search) {
                    $q2->whereRaw('LOWER(name) like ?', ["%{$search}%"]);
                });
            });
        }

        $rekaps = $query->orderBy('created_at', 'desc')->get();
        
        $rekaps->transform(function ($rekap) {
            $totalMinutes = 0;
            if (is_array($rekap->aktivitas)) {
                foreach ($rekap->aktivitas as $act) {
                    if (!empty($act['mulai']) && !empty($act['selesai'])) {
                        $m = Carbon::parse($act['mulai']);
                        $s = Carbon::parse($act['selesai']);
                        if ($s < $m) $s->addDay();
                        $totalMinutes += $m->diffInMinutes($s);
                    }
                }
            }
            $rekap->total_jam_formatted = floor($totalMinutes / 60) . 'j ' . ($totalMinutes % 60) . 'm';
            $rekap->total_sesi_computed = round($totalMinutes / 90, 2);
            return $rekap;
        });

        $this->rekaps = $rekaps;
    }

    public function openCalculateModal($rekapId)
    {
        $this->selectedRekapId = $rekapId;
        $rekap = rekap_absensi::with(['mapping.student', 'mapping.teacher', 'pendapatan'])->find($rekapId);
        $this->rekapDetail = $rekap;
        
        $this->toleransiMenit = 15;
        $this->standarSesiMenit = 90;

        $this->recalculateActivities();

        if ($rekap->pendapatan) {
            $this->statusPembayaran = $rekap->pendapatan->status == 'dibayarkan' ? 'dibayarkan_tutor' : 'pending';
            
            $totalSesiCalc = (float)$this->totalSesi;
            $standar = (int) $this->standarSesiMenit ?: 90;
            if ($standar > 0) {
                $totalSesiCalc += ((float)$this->totalKelebihanMenit / $standar);
            }

            if ($totalSesiCalc > 0) {
                $this->feeRifayaPerSesi = round($rekap->pendapatan->nominal_fee_rifaya / $totalSesiCalc);
                $this->feePerSesi = round(($rekap->pendapatan->nominal_fee_tutor + $rekap->pendapatan->nominal_fee_rifaya) / $totalSesiCalc);
            } else {
                $this->feeRifayaPerSesi = 25000;
                $this->feePerSesi = 0;
            }
            
            $this->calculateTotal();
        } else {
            $this->feePerSesi = 0;
            $this->feeRifayaPerSesi = 25000;
            $this->statusPembayaran = 'pending';
            $this->calculateTotal();
        }

        $this->totalPembayaranOrtu = 0;
        $this->fotoBuktiTf = null;
        $this->fotoPembayaranOrtu = null;

        $this->showCalculateModal = true;
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['toleransiMenit', 'standarSesiMenit'])) {
            $this->recalculateActivities();
        } elseif (in_array($propertyName, ['feePerSesi', 'feeRifayaPerSesi', 'totalPembayaranOrtu'])) {
            $this->calculateTotal();
        }
    }

    public function recalculateActivities()
    {
        $rekap = $this->rekapDetail;
        
        $this->totalDurationMinutes = 0;
        $this->totalKelebihanMenit = 0;
        $this->totalSesi = 0;
        $this->calculatedActivities = [];

        $standar = (int) $this->standarSesiMenit ?: 90;
        $toleransi = (int) $this->toleransiMenit ?: 0;

        if ($rekap && is_array($rekap->aktivitas)) {
            foreach ($rekap->aktivitas as $act) {
                $durasiAsli = 0;
                $durasiHitung = 0;
                $kelebihan = 0;

                if (!empty($act['mulai']) && !empty($act['selesai'])) {
                    $m = Carbon::parse($act['mulai']);
                    $s = Carbon::parse($act['selesai']);
                    if ($s < $m) $s->addDay();
                    $durasiAsli = $m->diffInMinutes($s);

                    if ($durasiAsli > $standar) {
                        $sisa = $durasiAsli - $standar;
                        $sisaMod60 = $sisa % 60;
                        if ($sisaMod60 < $toleransi) {
                            $kelebihan = $sisa - $sisaMod60;
                        } else {
                            $kelebihan = $sisa;
                        }
                    } else {
                        $kelebihan = 0;
                    }

                    $durasiHitung = $standar + $kelebihan;
                }

                $this->calculatedActivities[] = [
                    'tanggal' => $act['tanggal'] ?? '',
                    'materi' => $act['materi'] ?? '',
                    'mulai' => $act['mulai'] ?? '',
                    'selesai' => $act['selesai'] ?? '',
                    'durasi_asli' => $durasiAsli,
                    'durasi_hitung' => $durasiHitung,
                    'kelebihan_menit' => $kelebihan
                ];

                $this->totalDurationMinutes += $durasiHitung;
                $this->totalKelebihanMenit += $kelebihan;
                $this->totalSesi += 1;
            }
        }

        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->totalBayarSesi = (float)$this->feePerSesi * $this->totalSesi;
        $this->totalRifayaSesi = (float)$this->feeRifayaPerSesi * $this->totalSesi;
        
        $standar = (int) $this->standarSesiMenit ?: 90;
        if ($standar > 0) {
            $this->totalBayarKelebihan = ((float)$this->feePerSesi * $this->totalKelebihanMenit) / $standar;
            $this->totalRifayaKelebihan = ((float)$this->feeRifayaPerSesi * $this->totalKelebihanMenit) / $standar;
        } else {
            $this->totalBayarKelebihan = 0;
            $this->totalRifayaKelebihan = 0;
        }
        
        $this->totalFee = $this->totalBayarSesi + $this->totalBayarKelebihan;
        $this->pendapatanApps = $this->totalRifayaSesi + $this->totalRifayaKelebihan;
        $this->pendapatanTutor = max(0, $this->totalFee - $this->pendapatanApps);
    }

    public function saveFee()
    {
        $rules = [
            'feePerSesi' => 'required|numeric',
            'selectedRekapId' => 'required',
            'statusPembayaran' => 'required|in:pending,dibayarkan_tutor',
        ];

        if ($this->statusPembayaran === 'dibayarkan_tutor') {
            $rules['fotoBuktiTf'] = 'required|image|max:5048';
            $rules['fotoPembayaranOrtu'] = 'required|image|max:5048';
        }

        $this->validate($rules);
        $this->calculateTotal();

        $pendapatan = Pendapatan::where('rekap_absensi_id', $this->selectedRekapId)->first();
        if (!$pendapatan) {
            $pendapatan = new Pendapatan();
            $pendapatan->rekap_absensi_id = $this->selectedRekapId;
        }
        
        $pendapatan->nominal_fee_tutor = $this->pendapatanTutor;
        $pendapatan->nominal_fee_rifaya = $this->pendapatanApps;
        $pendapatan->status = $this->statusPembayaran == 'dibayarkan_tutor' ? 'dibayarkan' : 'pending';
        
        $pendapatan->standar_sesi_menit = $this->standarSesiMenit;
        $pendapatan->toleransi_menit = $this->toleransiMenit;
        $pendapatan->fee_per_sesi = $this->feePerSesi;
        $pendapatan->fee_rifaya_per_sesi = $this->feeRifayaPerSesi;

        if ($this->statusPembayaran === 'dibayarkan_tutor') {
            if ($this->fotoBuktiTf) {
                $path = $this->fotoBuktiTf->store('images/pembayaran', 'public');
                $pendapatan->foto = \Illuminate\Support\Facades\Storage::url($path);
            }
            if ($this->fotoPembayaranOrtu) {
                $path = $this->fotoPembayaranOrtu->store('images/pembayaran', 'public');
                $pendapatan->foto_gross_income = \Illuminate\Support\Facades\Storage::url($path);
            }
            // $pendapatan->nominal_gross_income = $this->totalPembayaranOrtu; // This column might not exist, skip it for safety, we are storing nominal_fee_rifaya which is the apps income
        }

        $pendapatan->save();

        $this->showCalculateModal = false;
        $this->loadRekaps();
        $this->js("alert('Berhasil menyimpan Kalkulasi Fee!')");
    }

    public function render()
    {
        return view('livewire.dashboard.akumulasi-fee')->layout('components.layouts.account_page');
    }
}
