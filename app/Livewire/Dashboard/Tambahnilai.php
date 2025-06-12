<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

use Livewire\Attributes\Layout;
use App\Models\mappingSekolah as ModelMSekolah;
use App\Models\MappingKelasSiswa;
use App\Models\MappingLabelNilai;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\NilaiAkhirSiswa;
use Illuminate\Support\Facades\DB;
class Tambahnilai extends Component
{
    #[Layout('components.layouts.account_page')]

    public ModelMSekolah $dataMAP;
    public $listsiswa =[];
    public $listlabelnilai =[];
    public $listNilai = [];
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
        $this->dataMAP = ModelMSekolah::find($id)->with('sekolah')->with('kelas.jenjang')->where('id',$id)->first(); 
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

        // "mapping_sekolah_id" => 1
        // "siswa_id" => 
       foreach ($siswas as $key => $value) {
            // dd($value);
            foreach($this->listlabelnilai->toArray() as $v){
                $this->createNilai($value['mapping_sekolah_id'],$value['siswa_id'],$v['id']);
            }
       }

       $_nilai = [];
       $n = NilaiAkhirSiswa::get();
       foreach($n as $v){
            if(!isset($_nilai[$v['siswa_id']])) $_nilai[$v['siswa_id']] =[];
            $_nilai[$v['siswa_id']][$v['mapping_label_nilai_id']] =$v->toArray();
       }
       $this->listNilai = $_nilai; 
    //    dd($this->listNilai);
    }
    public function changeNilai($id, $type, $id_siswa, $mapping_label_nilai_id,$kelas){
        // dd($this->listNilai[$id_siswa][$mapping_label_nilai_id][$type]);
        $c8= "Silahkan kerjakan soal perbaikan (10 soal yang diambil dari soal ASAT) <a href='https://forms.gle/Hjz24B9ijWwHzwRk6' class='text-blue-600'>https://forms.gle/Hjz24B9ijWwHzwRk6</a> (baca cara mengerjakannya, dan dkirim maksimal senin, 16 Juni 2025 pukul 17.00 WIB, tidak ada tambahan waktu karena sudah diberikan waktu yang lama)";

        $c7= "Silahkan kerjakan soal perbaikan (10 soal yang diambil dari soal ASAT) <a href='https://forms.gle/GodUeKKz3WYWkYo98' class='text-blue-600'> https://forms.gle/GodUeKKz3WYWkYo98</a> (baca cara mengerjakannya, dan dkirim maksimal senin, 16 Juni 2025 pukul 17.00 WIB, tidak ada tambahan waktu karena sudah diberikan waktu yang lama)";

        $aman = "Bagi yang sudah AMAN, tidak perlu mengerjakan tugas perbaikan, dikarenakan keterbatasan waktu dan kesibukkan pendampingan siswa yang perbaikan. Informasi ini sudah bisa menjadi bukti ketuntasan.";
        
        
        $update = NilaiAkhirSiswa::find($id);
        $data = [
            $type => $this->listNilai[$id_siswa][$mapping_label_nilai_id][$type]
        ];
  
        if($kelas === "VII" && $type =="type" && $this->listNilai[$id_siswa][$mapping_label_nilai_id][$type] == 2){
            $data['catatan'] = $c7;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['catatan'] = $c7;
        }else if($kelas === "VIII" && $type =="type" && $this->listNilai[$id_siswa][$mapping_label_nilai_id][$type] == 2){
            $data['catatan'] = $c8;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['catatan'] = $c8;
        }

        if($kelas === "VII" && $type =="nilai" && $this->listNilai[$id_siswa][$mapping_label_nilai_id][$type] <= 79){
            $data['catatan'] = $c7;
             $data['type'] =  2;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['catatan'] = $c7;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['type'] = 2;
        }else if($kelas === "VIII" && $type =="nilai" && $this->listNilai[$id_siswa][$mapping_label_nilai_id][$type] <= 79){
            $data['catatan'] =  $c8;
             $data['type'] =  2;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['catatan'] = $c8;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['type'] = 2;
        }
        
        if ($type =="nilai" && $this->listNilai[$id_siswa][$mapping_label_nilai_id][$type] >= 80){
            $data['catatan'] =  $aman;
            $data['type'] =  1;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['catatan'] = $aman;
             $this->listNilai[$id_siswa][$mapping_label_nilai_id]['type'] = 1;
        }
         
    

        if($update){
            $update->fill($data)->save();
            $this->notify('Sukses update data');
        }else{ 
            return  $this->notify('gagal update data','warning');
        } 
    }
    public function createNilai($mapping_sekolah_id, $id_siswa,$mapping_label_nilai_id){
       
        $nilai = NilaiAkhirSiswa::where("mapping_label_nilai_id",$mapping_label_nilai_id )->where("mapping_sekolah_id",$mapping_sekolah_id)->where("siswa_id",$id_siswa )->first();
      
        if($nilai == null){
            $_NEW = [
                "mapping_label_nilai_id" => $mapping_label_nilai_id,
                "mapping_sekolah_id" => $mapping_sekolah_id,
                "siswa_id" => $id_siswa, 
            ];
            NilaiAkhirSiswa::create($_NEW);
        } 
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
