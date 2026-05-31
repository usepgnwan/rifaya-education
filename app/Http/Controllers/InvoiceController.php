<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rekap_absensi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class InvoiceController extends Controller
{
    private function getCalculatedActivities($rekap)
    {
        $pendapatan = $rekap->pendapatan;
        $standar = $pendapatan->standar_sesi_menit ?? 90;
        $toleransi = $pendapatan->toleransi_menit ?? 15;

        $calculatedActivities = [];
        $totalSesi = 0;
        $totalKelebihanMenit = 0;

        if (is_array($rekap->aktivitas)) {
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

                $calculatedActivities[] = [
                    'tanggal' => $act['tanggal'] ?? '',
                    'materi' => $act['materi'] ?? '',
                    'mulai' => $act['mulai'] ?? '',
                    'selesai' => $act['selesai'] ?? '',
                    'durasi_asli' => $durasiAsli,
                    'durasi_hitung' => $durasiHitung,
                    'kelebihan_menit' => $kelebihan
                ];

                $totalKelebihanMenit += $kelebihan;
                $totalSesi += 1;
            }
        }

        return [
            'activities' => $calculatedActivities,
            'totalSesi' => $totalSesi,
            'totalKelebihanMenit' => $totalKelebihanMenit,
            'standar' => $standar,
        ];
    }

    public function invoiceOrtu($id)
    {
        if (!Gate::allows('hasRole', [1,2])) {
            abort(401);
        }

        $rekap = rekap_absensi::with(['mapping.student', 'mapping.teacher', 'pendapatan'])->findOrFail($id);
        if (!$rekap->pendapatan) {
            return redirect()->back()->with('error', 'Fee belum dikalkulasi.');
        }

        $calc = $this->getCalculatedActivities($rekap);
        $feePerSesi = $rekap->pendapatan->fee_per_sesi ?? 0;
        
        $totalBayarSesi = $feePerSesi * $calc['totalSesi'];
        $totalBayarKelebihan = 0;
        if ($calc['standar'] > 0) {
            $totalBayarKelebihan = ($feePerSesi * $calc['totalKelebihanMenit']) / $calc['standar'];
        }
        $totalFee = $totalBayarSesi + $totalBayarKelebihan;

        $data = [
            'rekap' => $rekap,
            'calc' => $calc,
            'totalBayarSesi' => $totalBayarSesi,
            'totalBayarKelebihan' => $totalBayarKelebihan,
            'totalFee' => $totalFee,
            'feePerSesi' => $feePerSesi,
        ];

        $pdf = Pdf::loadView('pdf.invoice-ortu', $data);
        return $pdf->download('invoice-ortu-' . \Illuminate\Support\Str::slug($rekap->mapping->student->name ?? 'siswa') . '.pdf');
    }

    public function invoiceGuru($id)
    {
        if (!Gate::allows('hasRole', [1,2])) {
            abort(401);
        }

        $rekap = rekap_absensi::with(['mapping.student', 'mapping.teacher', 'pendapatan'])->findOrFail($id);
        if (!$rekap->pendapatan) {
            return redirect()->back()->with('error', 'Fee belum dikalkulasi.');
        }

        $calc = $this->getCalculatedActivities($rekap);
        
        $data = [
            'rekap' => $rekap,
            'calc' => $calc,
            'pendapatanTutor' => $rekap->pendapatan->nominal_fee_tutor ?? 0,
        ];

        $pdf = Pdf::loadView('pdf.invoice-guru', $data);
        return $pdf->download('invoice-guru-' . \Illuminate\Support\Str::slug($rekap->mapping->teacher->name ?? 'tutor') . '.pdf');
    }
}
