<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\mappingSekolah as ModelMSekolah;
use Illuminate\Support\Facades\DB;
class NilaiPerkelas extends Component
{   

    #[Title('Nilai - with Rifaya Education')]
    #[Layout('components.layouts.guest_page')]
    public $listsiswa =[];
    public $request = [
        "kelas_id" => null
    ];
    public function getList(){
        if($this->request['kelas_id'] == null ||$this->request['kelas_id'] == "" ||$this->request['kelas_id'] == 0 ){
            
            return  $this->notify('pilih kelas dulu','warning');
        }
        $siswas = DB::table('mapping_kelas_siswas')
        ->join('siswas', 'mapping_kelas_siswas.siswa_id', '=', 'siswas.id')
        ->where('mapping_kelas_siswas.mapping_sekolah_id', $this->request['kelas_id'] )
        // ->select('siswas.nama_siswa')
        ->orderBy('siswas.nama_siswa', 'asc')
        ->get()
        ->map(fn($x) => (array) $x)
        ->toArray();


       $this->listsiswa = collect($siswas)->toArray();
        
    }
    public function render()
    {
        $kelas =  ModelMSekolah::query()->with('sekolah')->with('kelas.jenjang')->with('mapel')->get();
   
        return view('livewire.front.nilai-perkelas',[
            "kelas"=>$kelas
        ]);
    }
}
