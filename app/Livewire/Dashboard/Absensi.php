<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\Absensi as ModelsAbsensi;
use App\Models\MappingSiswa;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Absensi extends Component
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
        'tanggal' => null,
        'jam_ajar' => null,
        'sistem_mengajar' => null,
        'tambahan_jam_ajar' => null,
        'foto' => null,
        'catatan' => null,

    ];
    public bool $showFilters = false;
    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public ModelsAbsensi $_data;

    public $_images = null;
    public function rules()
    {

        if( is_string($this->request['foto']) ){
            $this->_images = $this->request['foto'];
            $this->request['foto'] = null;
        }
        return [
            'request.mapping_siswa_id' => 'required',
            'request.tanggal' => 'required',
            'request.jam_ajar' => 'required',
            'request.sistem_mengajar' => 'required',
            'request.foto' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
        ];
    }

    public function validationAttributes () {
        return [
            'request.mapping_siswa_id' => 'Siswa',
            'request.tanggal' => 'Tanggal',
            'request.jam_ajar' => 'Jam Ajar',
            'request.sistem_mengajar' => 'Sistem Mengajar',
            'request.foto' => 'foto',
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
            'Absensi Harian' =>  [
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
        return ModelsAbsensi::make();
    }
    public function save()
    {

       try {
            $this->validate();
            if (isset($this->request['foto']) && is_string($this->request['foto']) === false && !is_null($this->request['foto'])) {
                // Check if this is an update and the post has an old image
                if ($this->_data && $this->_data->foto) {
                    // Check if the old image exists in storage
                    // change /storage to ''

                    $prev_img = str_replace('/storage/', '', $this->_data->foto);

                    if (Storage::disk('public')->exists($prev_img)) {
                        // Delete the old image
                        Storage::disk('public')->delete($prev_img );
                    }
                }
                // Store the new image
                $this->request['foto'] = $this->request['foto']->store('images', 'public');

                // Generate the URL for the stored image
                $this->request['foto'] = Storage::url($this->request['foto']);
            } else {
                // If no new image is uploaded, retain the existing image URL
                $this->request['foto'] =  $this->_images == 'remove' ? null : ($this->post->image ?? null);
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

    public function create()
    {
        $this->reset('request');
        $this->dispatch('reinitSelect2');
        $this->_data = $this->makeBlankTransaction();
        $this->showEditModal = true;
    }

    public function edit(ModelsAbsensi $data)
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
        $query = ModelsAbsensi::query()
        ->when(!in_array(1, auth()->user()->roles->pluck('id')->toArray()), function($query){
            $query->where('teacher_id','=', auth()->user()->id );
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
        return view('livewire.dashboard.absensi',[ 'data' => $this->rows,'siswa'=>$siswa ]);
    }
}

