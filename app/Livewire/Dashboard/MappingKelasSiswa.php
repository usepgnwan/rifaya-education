<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\mappingSekolah as ModelMSekolah;
use App\Models\Sekolah;
use App\Models\Kelas;
use Livewire\Attributes\Layout;
use App\Models\MataPelajaran;
use Livewire\Component;
use Illuminate\Support\Str;

class MappingKelasSiswa extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    #[Layout('components.layouts.account_page')]

    public $filters = [
        'search' => '',
    ];
    protected $queryString = ['sorts'];

    public $request = [
        'sekolah_id' => null,
        'kelas_id' => null,
        'title' => null,
    ];


    public $datamapel = [ 
        'mata_pelajaran_id' => null, 
    ];

    
   
    public bool $showFilters = false;
    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public ModelMSekolah $_data;

    public function rules()
    {
        $userId = $this->_data->id;

        // dd($userId);
        return [
            'request.title' => 'required',
            'request.sekolah_id' => 'required',
            'request.kelas_id' => 'required',
        ];
    }

    public function validationAttributes () {
        return [
            'request.title' => 'Nama Kelas',
            'request.sekolah_id' => 'Nama Sekolah',
            'request.kelas_id' => 'Jenjang Kelas',
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
            'Siswa' =>  [
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
        return ModelMSekolah::make();
    }
    public function save()
    { 
       try {
            $this->validate();
            if(!$this->_data->id){
                $this->_data->create($this->request);
            }else{ 
                // Update the user
                $this->_data->fill($this->request);
                $this->_data->save();
                $message = 'Succes update kelas' ;
            }

            $this->notify($message ?? 'Succes create kelas ' );
            $this->showEditModal = false;

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }

    public function create()
    {
        $this->_data = $this->makeBlankTransaction();
        $this->request = $this->_data->getAttributes();
        $this->showEditModal = true;
    }

    public function edit(ModelMSekolah $mapel)
    {
        $this->useCachedRows();
        if ($this->_data->isNot($mapel)) $this->_data = $mapel;
        $this->request['title']  = $this->_data->title;
        $this->request['sekolah_id']  = $this->_data->sekolah_id;
        $this->request['kelas_id']  = $this->_data->kelas_id;
        $this->dispatch('reinitSelect2');
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
        $query = ModelMSekolah::query()->with('sekolah')->with('kelas.jenjang')->with('mapel');

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
        return $this->applyPagination($this->rowsQuery);
        });
    }

    public $statMapel = false;
    public ModelMSekolah $editMs;
    public function addMapel(ModelMSekolah $mp){
        $mp->load(['kelas', 'mapel']);
        $this->editMs = $mp;
        $this->datamapel['mata_pelajaran_id'] = array_column($this->editMs->mapel->toArray(),'id');
        $this->statMapel = true;
        $this->dispatch('reinitSelect2');
    }

     public function saveMapel()
    {
       try {
            $this->statMapel = false;
            $mapel = $this->datamapel['mata_pelajaran_id']; 
            $this->editMs->mapel()->sync($mapel); 
            $this->notify($message ?? 'Succes tambah mapel ' );
        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }
    public function render()
    {
        $sekolah = Sekolah::get();
        // $mapel = MataPelajaran::get();
        $kelas = Kelas::get(); 
        return view('livewire.dashboard.mapping-kelas-siswa',[
            'data' => $this->rows,
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            // 'mapel' => $mapel,
        ]);
    }
}
