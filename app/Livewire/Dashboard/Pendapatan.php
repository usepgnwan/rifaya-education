<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\MappingSiswa;
use App\Models\Pendapatan as ModelsPendapatan;
use App\Models\rekap_absensi;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Pendapatan extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    use WithFileUploads;
    #[Layout('components.layouts.account_page')]

    public $filters = [
        'search' => '',
    ];
    protected $queryString = ['sorts'];

    public $request = [
        'rekap_absensi_id' => null,
        "user_affiliate_id"=>null,
        "nominal_fee_rifaya"=>null,
        "nominal_fee_tutor"=>null,
        "nominal_affiliate"=>null,
        "tanggal_pembayaran"=>null,
        "foto"=>null,
        "foto_gross_income"=>null,
        "foto_affiliate"=>null,
        "status"=>null,
    ];
    public bool $showFilters = false;
    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $editModal = false;
    public ModelsPendapatan $_data;

    public $_images = null;
    public $_images2 = null;
    public $_images3 = null;
    public $type = 'tuttor';
    public $_rekap_absensi = [];
    public $rekap_absensi = [];
    public $_affiliator = [];
    public function updatedRequestUserAffiliateId($id){
        // $this->dispatch('reinitSelect2');
    }
    public function updatedRequestRekapAbsensiId($id){


        $this->_rekap_absensi = rekap_absensi::with('pendapatan')->where('id','=', $id)->first();
        if(isset($this->_rekap_absensi->mapping->student->user_affiliate_id) && !is_null($this->_rekap_absensi->mapping->student->user_affiliate_id)  ){
            $affliate_id = $this->_rekap_absensi->mapping->student->user_affiliate_id;

            // dd();
            $pendapatan = ModelsPendapatan::whereHas('rekap_absensi',function($q){
                return $q->whereHas('mapping',function($query){
                    return $query->where('student_id', '=', $this->_rekap_absensi->mapping->student->id);
                });
            })->first();
            // kalo pendapatan kosong affiliate belum di bayarkan
            if(empty($pendapatan) || $this->editModal){
                // dd($this->editModal);
                $affiliator = User::whereHas('my_affiliate', function($q) use ($affliate_id){
                    return $q->where('user_affiliate_id','=',$affliate_id);
                })->get();
                $this->_affiliator = $affiliator;
            }

        }

        if(!empty($this->_affiliator) || !$this->editModal ){
            // $this->dispatch('reinitSelect2');
        }

        if($id == null){
            $this->_rekap_absensi = [];
            $this->_affiliator = [];
        }

        // $this->dispatch('reinitSelect2');
    }
    public function rules()
    {

        if( is_string($this->request['foto']) ){
            $this->_images = $this->request['foto'];

        }

        if( is_string($this->request['foto_affiliate']) ){
            $this->_images2 = $this->request['foto_affiliate'];

        }
        if( is_string($this->request['foto_gross_income']) ){
            $this->_images3 = $this->request['foto_gross_income'];

        }

        return [
            'request.rekap_absensi_id' => 'required',
            // 'request.fee_transfer' => 'required',
            // 'request.tanggal_awal' => 'required',
            // 'request.tanggal_akhir' => 'required',
            // 'request.jadwal_terlaksana' => 'required',
            // 'request.total_sesi' => 'required',
            // 'request.laporan' => 'required',
            // 'request.file' => 'required|mimes:pdf,jpg,png,jpeg,svg,gif|max:5048',
        ];
    }

    public function validationAttributes () {
        return [
            'request.rekap_absensi_id' => 'Siswa',
            // 'request.fee_transfer' => 'Fee Transfer',
            // 'request.tanggal_awal' => 'Tanggal Awal',
            // 'request.tanggal_akhir' => 'Tanggal Akhir',
            // 'request.jadwal_terlaksana' => 'Jadwal Terlaksana',
            // 'request.total_sesi' => 'Total Sesi',
            // 'request.file' => 'File',
            // 'request.laporan' => 'Laporan',
        ];
    }

    public function mount($type = '')
    {



        $this->type = $type;
        if($this->type =='affiliate'){
            if (!Gate::allows('hasRole', [1,5])) {
                abort(401);
            }
        }
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
        return ModelsPendapatan::make();
    }
    public function save()
    {

       try {
            $this->validate();
            if (isset($this->request['foto']) && is_string($this->request['foto']) === false && !is_null($this->request['foto'])) {

                if ($this->_data && $this->_data->foto) {

                    $prev_img = str_replace('/storage/', '', $this->_data->foto);

                    if (Storage::disk('public')->exists($prev_img)) {
                        Storage::disk('public')->delete($prev_img );
                    }
                }
                $this->request['foto'] = $this->request['foto']->store('images/pembayaran', 'public');

                $this->request['foto'] = Storage::url($this->request['foto']);
            } else {
                // If no new image is uploaded, retain the existing image URL
                $this->request['foto'] =  $this->_images == 'remove' ? null : ($this->_data->foto ?? null);
            }
            if (isset($this->request['foto_affiliate']) && is_string($this->request['foto_affiliate']) === false && !is_null($this->request['foto_affiliate'])) {

                if ($this->_data && $this->_data->foto_affiliate) {

                    $prev_img = str_replace('/storage/', '', $this->_data->foto_affiliate);

                    if (Storage::disk('public')->exists($prev_img)) {
                        Storage::disk('public')->delete($prev_img );
                    }
                }
                $this->request['foto_affiliate'] = $this->request['foto_affiliate']->store('images/pembayaran', 'public');

                $this->request['foto_affiliate'] = Storage::url($this->request['foto_affiliate']);
            } else {
                // If no new image is uploaded, retain the existing image URL
                $this->request['foto_affiliate'] =  $this->_images2 == 'remove' ? null : ($this->_data->foto_affiliate ?? null);
            }
            if (isset($this->request['foto_gross_income']) && is_string($this->request['foto_gross_income']) === false && !is_null($this->request['foto_gross_income'])) {

                if ($this->_data && $this->_data->foto_gross_income) {

                    $prev_img = str_replace('/storage/', '', $this->_data->foto_gross_income);

                    if (Storage::disk('public')->exists($prev_img)) {
                        Storage::disk('public')->delete($prev_img );
                    }
                }
                $this->request['foto_gross_income'] = $this->request['foto_gross_income']->store('images/pembayaran', 'public');

                $this->request['foto_gross_income'] = Storage::url($this->request['foto_gross_income']);
            } else {
                // If no new image is uploaded, retain the existing image URL
                $this->request['foto_gross_income'] =  $this->_images3 == 'remove' ? null : ($this->_data->foto_gross_income ?? null);
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
        $this->rekap_absensi = rekap_absensi::with('pendapatan')->whereDoesntHave('pendapatan')
        ->orWhereHas('pendapatan', function ($q) {
            $q->whereNull('rekap_absensi_id');
        })->get();
        $this->reset('_rekap_absensi','_affiliator');
        $this->reset('request');
        // $this->dispatch('reinitSelect2');
        $this->_data = $this->makeBlankTransaction();
        $this->showEditModal = true;
        $this->editModal = false;
    }

    public function edit(ModelsPendapatan $data)
    {

        $this->editModal = true;
        $this->reset('_rekap_absensi','_affiliator');
        $this->rekap_absensi = rekap_absensi::with('pendapatan')->get();
        $this->useCachedRows();
        if ($this->_data->isNot($data)) $this->_data = $data;
        $data = collect($data)->toArray();
        foreach($this->request as $k => $v){
            $this->request[$k] = $data[$k] ?? null;
        }
        $this->updatedRequestRekapAbsensiId($data['rekap_absensi_id']);
        // dd($this->request);
        // $this->dispatch('reinitSelect2');
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
        $query = ModelsPendapatan::query()

        ->when(!in_array(1, auth()->user()->roles->pluck('id')->toArray()) && $this->type =='tuttor', function($query){
           return $query->whereHas('rekap_absensi', function($q){
                return $q->where('teacher_id','=', auth()->user()->id);
            });
        })
        ->when($this->type == 'affiliate' &&  in_array(5, auth()->user()->roles->pluck('id')->toArray()), function($query){
            return $query->Where('user_affiliate_id', '=', auth()->user()->my_affiliate->user_affiliate_id);
        })
        ->when($this->type == 'affiliate' &&  in_array(1, auth()->user()->roles->pluck('id')->toArray()), function($query){
            return $query->Where('user_affiliate_id', '!=',null);
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


        return view('livewire.dashboard.pendapatan',[ 'data' => $this->rows  ]);
    }
}

