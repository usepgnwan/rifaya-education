<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\Siswa as ModelSiswa;
use App\Models\Sekolah;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

class SiswaSekolah extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    #[Layout('components.layouts.account_page')]

    public $filters = [
        'search' => '',
    ];
    protected $queryString = ['sorts'];

    public $request = [
        'nama_siswa' => null,
        'sekolah_id' => null,
        'kode' => null,
    ];

    
   
    public bool $showFilters = false;
    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public ModelSiswa $_data;

    public function rules()
    {
        $userId = $this->_data->id;

        // dd($userId);
        return [
            'request.nama_siswa' => 'required|min:3',
            'request.sekolah_id' => 'required',
        ];
    }

    public function validationAttributes () {
        return [
            'request.nama_siswa' => 'Nama Siswa',
            'request.sekolah_id' => 'Nama Sekolah',
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
        return ModelSiswa::make();
    }
    public function save()
    {

    // sekolah_id
    // nama_siswa
    // slug
    // kode
       try {
            $this->validate();
            if(!$this->_data->id){
                 $this->request['kode'] = 'RFY' . Str::random(5);
                $this->_data->create($this->request);
            }else{ 
                // Update the user
                $this->_data->fill($this->request);
                $this->_data->save();
                $message = 'Succes update Siswa '.$this->_data->nama_siswa;
            }

            $this->notify($message ?? 'Succes create Siswa '. $this->request['nama_siswa']);
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

    public function edit(ModelSiswa $mapel)
    {
        $this->useCachedRows();
        if ($this->_data->isNot($mapel)) $this->_data = $mapel;
        $this->request['nama_siswa']  = $this->_data->nama_siswa;
        $this->request['sekolah_id']  = $this->_data->sekolah_id;
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
        $query = ModelSiswa::query()->with('sekolah');

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
        $sekolah = Sekolah::get();
        return view('livewire.dashboard.siswa-sekolah',[
            'data' => $this->rows,
            'sekolah' => $sekolah,
        ]);
    }
}
