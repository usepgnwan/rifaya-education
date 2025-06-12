<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

use Livewire\Attributes\Layout;
use App\Models\mappingSekolah as ModelMSekolah;
use App\Models\MappingKelasSiswa;
use App\Models\MappingLabelNilai;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
class Tambahnilai extends Component
{
    #[Layout('components.layouts.account_page')]

    public ModelMSekolah $dataMAP;
    public $listsiswa =[];
    public $listlabelnilai =[];
    public $request =[
        "siswa_id"=> null,
        "mapping_sekolah_id"=>null
    ];
    public $label =[
        "mapping_sekolah_id"=> null,
        "mata_pelajaran_id"=>null,
        "title"=>null
    ];
    public function mount($id =null)
    {
        $this->dataMAP = ModelMSekolah::find($id)->with('sekolah')->with('kelas.jenjang')->first();
        
        $this->request['mapping_sekolah_id'] =  $this->dataMAP->id;
        $this->label['mapping_sekolah_id'] =  $this->dataMAP->id;
        $this->siswa($id);
    }

    public function siswa($id){
        $siswas = DB::table('mapping_kelas_siswas')
        ->join('siswas', 'mapping_kelas_siswas.siswa_id', '=', 'siswas.id')
        ->where('mapping_kelas_siswas.mapping_sekolah_id', $id)
        // ->select('siswas.nama_siswa')
        ->get()
        ->map(fn($x) => (array) $x)
        ->toArray();


       $this->listsiswa = collect($siswas)->toArray();
       $this->listlabelnilai =MappingLabelNilai::where('mapping_sekolah_id',$id)->with('mapel')->get(); 
    }

    public $showEditModal =false;
    public function addSiswa(){
        $this->showEditModal = true;
    }

    public function save()
    { 
       try {
            // $this->validate();  
            // dd($this->request);
            MappingKelasSiswa::create($this->request);
            
            $this->siswa($this->dataMAP->id); 
            $this->notify($message ?? 'Succes tambah siswa ' );
            $this->showEditModal = false;

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }
    public $showtModalNilai =false;
    public function addLabelNilai(){
        $this->showtModalNilai = true;
    }

    public function saveLabel()
    { 
       try {
            // $this->validate();
            MappingLabelNilai::create($this->label);
            
            $this->siswa($this->dataMAP->id); 
            $this->notify($message ?? 'Succes tambah siswa ' );
            $this->showtModalNilai = false;

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }
    public function render()
    {
        $existSis = collect($this->listsiswa)->pluck('siswa_id') ;
        $siswa = Siswa::whereNotIn('id', $existSis)->get();
        $mapel = MataPelajaran::get();
        // dd($mapel);
        return view('livewire.dashboard.tambahnilai',[
            'siswa' => $siswa,
            'mapel'=> $mapel
        ]);
    }
}
