<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\MappingSiswa;
use App\Models\rekap_absensi;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RekapAbsensi extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    use WithFileUploads;
    #[Layout('components.layouts.account_page')]

    public $filters = [
        'search' => '',
    ];
    protected $queryString = ['sorts'];

    public $request = [
        'teacher_id' => null,
        'mapping_siswa_id' => null,
        'fee_transfer'=> null,
        'tanggal_awal'=> null,
        'tanggal_akhir'=> null,
        'jadwal_terlaksana'=> null,
        'tambahan_jam_ajar'=> null,
        'total_sesi'=> null,
        'laporan'=> null,
        'file'=> null,
        'catatan'=> null,
        'aktivitas'=> [],
    ];
    public bool $showFilters = false;
    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $showAktivitasModal = false;
    public $selectedRekapId = null;
    public $currentAktivitasList = [];
    public $editAktivitasIndex = null;
    
    public $formAktivitas = [
        'tanggal' => '',
        'materi' => '',
        'mulai' => '',
        'selesai' => ''
    ];

    public $tempAktivitas = [
        'tanggal' => '',
        'materi' => '',
        'mulai' => '',
        'selesai' => ''
    ];
    public $tempAktivitasIndex = null;

    public rekap_absensi $_data;

    public $_images = null;
    public function rules()
    {

        if( is_string($this->request['file']) ){
            $this->_images = $this->request['file'];
            // $this->request['file'] = null;
        }
        return [
            'request.mapping_siswa_id' => 'required',
            'request.fee_transfer' => 'required',
            'request.tanggal_awal' => 'required',
            'request.tanggal_akhir' => 'required',
            'request.total_sesi' => 'required',
            'request.laporan' => 'required',
            'request.file' => 'nullable|mimes:pdf,jpg,png,jpeg,svg,gif|max:5048',
        ];
    }

    public function validationAttributes () {
        return [
            'request.mapping_siswa_id' => 'Siswa',
            'request.fee_transfer' => 'Fee Transfer',
            'request.tanggal_awal' => 'Tanggal Awal',
            'request.tanggal_akhir' => 'Tanggal Akhir',
            'request.total_sesi' => 'Total Sesi',
            'request.file' => 'File',
            'request.laporan' => 'Laporan',
        ];
    }

    public function mount()
    {

        $this->_data = $this->makeBlankTransaction();
        $this->default_sorts = ['created_at' => 'desc'];
        $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Upload Rekap Absensi' =>  [
                'active' => false,
            ]
        ];
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    function makeBlankTransaction()
    {
        return rekap_absensi::make();
    }
    public function save()
    {

       try {
        // dd($this->request);
            $this->validate();
            if (isset($this->request['file']) && is_string($this->request['file']) === false && !is_null($this->request['file'])) {
                // Check if this is an update and the post has an old image
                if ($this->_data && $this->_data->file) {
                    // Check if the old image exists in storage
                    // change /storage to ''

                    $prev_img = str_replace('/storage/', '', $this->_data->file);

                    if (Storage::disk('public')->exists($prev_img)) {
                        // Delete the old image
                        Storage::disk('public')->delete($prev_img );
                    }
                }
                // Store the new image
                $this->request['file'] = $this->request['file']->store('images', 'public');

                // Generate the URL for the stored image
                $this->request['file'] = Storage::url($this->request['file']);
            } else {
                // If no new image is uploaded, retain the existing image URL
                $this->request['file'] =  $this->_images == 'remove' ? null : ($this->post->image ?? null);
            }

            if(!$this->_data->id){
                $this->request['teacher_id'] = auth()->user()->id;

                $this->_data->create($this->request);
            }else{

                // Update the user
                $this->_data->fill($this->request);
                $this->_data->save();
                $message = 'Succes update Absensi ';
            }

            $this->notify($message ?? 'Succes create Absensi ');
            $this->showEditModal = false;

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }

    public function openAktivitasModal($rekapId)
    {
        $this->selectedRekapId = $rekapId;
        $rekap = rekap_absensi::find($rekapId);
        $this->currentAktivitasList = is_array($rekap->aktivitas) ? $rekap->aktivitas : [];
        $this->resetAktivitasForm();
        $this->showAktivitasModal = true;
    }

    public function resetAktivitasForm()
    {
        $this->formAktivitas = ['tanggal' => '', 'materi' => '', 'mulai' => '', 'selesai' => ''];
        $this->editAktivitasIndex = null;
    }

    public function editAktivitas($index)
    {
        $this->formAktivitas = $this->currentAktivitasList[$index];
        $this->editAktivitasIndex = $index;
    }

    public function deleteAktivitas($index)
    {
        unset($this->currentAktivitasList[$index]);
        $this->currentAktivitasList = array_values($this->currentAktivitasList);
        $this->saveAktivitasToDb();
    }

    public function saveAktivitas()
    {
        $this->validate([
            'formAktivitas.tanggal' => 'required|date',
            'formAktivitas.materi' => 'required|string',
            'formAktivitas.mulai' => 'required|string',
            'formAktivitas.selesai' => 'required|string',
        ]);

        if ($this->editAktivitasIndex !== null) {
            $this->currentAktivitasList[$this->editAktivitasIndex] = $this->formAktivitas;
        } else {
            $this->currentAktivitasList[] = $this->formAktivitas;
        }

        $this->saveAktivitasToDb();
        $this->resetAktivitasForm();
        $this->notify('Aktivitas berhasil disimpan');
    }

    private function saveAktivitasToDb()
    {
        $rekap = rekap_absensi::find($this->selectedRekapId);
        if ($rekap) {
            $rekap->aktivitas = $this->currentAktivitasList;
            $rekap->save();
        }
    }

    public function create()
    {
        $this->reset('request');
        $this->dispatch('reinitSelect2');
        $this->_data = $this->makeBlankTransaction();
        $this->showEditModal = true;
    }

    public function addTempAktivitas()
    {
        $this->validate([
            'tempAktivitas.tanggal' => 'required|date',
            'tempAktivitas.materi' => 'required|string',
            'tempAktivitas.mulai' => 'required|string',
            'tempAktivitas.selesai' => 'required|string',
        ]);
        
        if (!isset($this->request['aktivitas']) || !is_array($this->request['aktivitas'])) {
            $this->request['aktivitas'] = [];
        }

        if ($this->tempAktivitasIndex !== null) {
            $this->request['aktivitas'][$this->tempAktivitasIndex] = $this->tempAktivitas;
        } else {
            $this->request['aktivitas'][] = $this->tempAktivitas;
        }
        $this->resetTempAktivitas();
    }

    public function resetTempAktivitas()
    {
        $this->tempAktivitas = ['tanggal' => '', 'materi' => '', 'mulai' => '', 'selesai' => ''];
        $this->tempAktivitasIndex = null;
    }

    public function editTempAktivitas($index)
    {
        $this->tempAktivitas = $this->request['aktivitas'][$index];
        $this->tempAktivitasIndex = $index;
    }

    public function removeTempAktivitas($index)
    {
        unset($this->request['aktivitas'][$index]);
        $this->request['aktivitas'] = array_values($this->request['aktivitas']);
    }

    public function edit(rekap_absensi $data)
    {
        $this->useCachedRows();
        $this->dispatch('reinitSelect2');
        if ($this->_data->isNot($data)) $this->_data = $data;
        $data = collect($data)->toArray();
        foreach($this->request as $k => $v){
            $this->request[$k] = $data[$k] ?? null;
        }
        if (!isset($this->request['aktivitas']) || !is_array($this->request['aktivitas'])) {
            $this->request['aktivitas'] = [];
        }
        $this->resetTempAktivitas();
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {

        $deleteCount = $this->selectedRowsQuery->count();
        $this->selectedRowsQuery->delete();
        $this->showDeleteModal = false;
        $this->selectPage = false;
        $this->notify('You\'ve deleted '.$deleteCount.' transactions');
    }
    public function resetFilters() { $this->reset('filters'); }
    public function updatedFilters()
    {
        $this->resetPage();
    }
    public function getRowsQueryProperty()
    {
        // dd($this->perPage);
        $query = rekap_absensi::query()
        ->when(!in_array(1, auth()->user()->roles->pluck('id')->toArray()), function($query){
            $query->where('teacher_id','=', auth()->user()->id );
        })
        ->when(!empty($this->filters['search']), function($query){
            $query->whereHas('mapping', function ($query) {
                $query->whereHas('student', function($q) {
                    $q->where('name', 'like', '%' . $this->filters['search'] . '%');
                })
                ->orWhereHas('teacher', function($q) {
                    $q->where('name', 'like', '%' . $this->filters['search'] . '%');
                });
            });
        });
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
        return $this->applyPagination($this->rowsQuery);
        });
    }


    public function render()
    {
        $siswa = MappingSiswa::where('teacher_id', '=', auth()->user()->id)->get();
        // dd($siswa);
        return view('livewire.dashboard.rekap-absensi',[ 'data' => $this->rows,'siswa'=>$siswa ]);
    }
}

