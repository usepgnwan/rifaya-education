<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\Kelas;
use App\Models\MappingSiswa as ModelsMappingSiswa;
use App\Models\MataPelajaran;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MappingSiswa extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    #[Layout('components.layouts.account_page')]

    public $filters = [
        'search' => '',
    ];
    protected $queryString = ['sorts'];

    public $request = [
        'teacher_id' => null,
        'kelas_id' => null,
        'student_id' => null,
        'matapelajaran_id' => null,
        'tanggal_awal' => null,
        'tanggal_akhir' => null,
        'perkiraan_sesi' => null,
        'status' => null,

    ];
    public bool $showFilters = false;
    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public ModelsMappingSiswa $_data;

    public function rules()
    {
        return [
            'request.teacher_id' => 'required',
            'request.student_id' => 'required',
            'request.kelas_id' => 'required',
            'request.matapelajaran_id' => 'required',
            'request.tanggal_awal' => 'required',
            'request.tanggal_akhir' => 'required',
            'request.perkiraan_sesi' => 'required',
            'request.status' => 'required|in:aktif,non-aktif',
        ];
    }

    public function validationAttributes () {
        return [
            'request.teacher_id' => 'Guru',
            'request.student_id' => 'Siswa',
            'request.kelas_id' => 'Kelas',
            'request.matapelajaran_id' => 'Mata Pelajaran',
            'request.tanggal_awal' => 'Tanggal Awal',
            'request.tanggal_akhir' => 'Tanggal Awal',
            'request.perkiraan_sesi' => 'Perkiraan Sesi',
            'request.status' => 'Status',
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
            'Mapping Guru & Siswa Les' =>  [
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
        return ModelsMappingSiswa::make();
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
                $message = 'Succes update Mapping Siswa & Guru ';
            }

            $this->notify($message ?? 'Succes create Mapping Siswa & Guru ');
            $this->showEditModal = false;

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }

    public function create()
    {
        $this->reset('request');
        $this->dispatch('reinitSelect2');
        $this->_data = $this->makeBlankTransaction();
        $this->showEditModal = true;
    }

    public function edit(ModelsMappingSiswa $data)
    {
        $this->useCachedRows();
        $this->dispatch('reinitSelect2');
        if ($this->_data->isNot($data)) $this->_data = $data;
        $data = collect($data)->toArray();
        foreach($this->request as $k => $v){
            $this->request[$k] = $data[$k] ?? null;
        }
        // dd($this->request);
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
        $query = ModelsMappingSiswa::query();

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
        $teacher = User::where('status','=','aktif')->whereHas('roles', function($query){
            return $query->where('id', '=',2);
        })->get();
        $student = User::where('status','=','aktif')->whereHas('roles', function($query){
            return $query->where('id', '=',3);
        })->get();
        $mapel = MataPelajaran::get();
        $kelas = Kelas::get();
        return view('livewire.dashboard.mapping-siswa',[
            'data' => $this->rows,
            'student' => $student,
            'teacher' => $teacher,
            'mapel' => $mapel,
            'kelas' => $kelas,
        ]);
    }
}
