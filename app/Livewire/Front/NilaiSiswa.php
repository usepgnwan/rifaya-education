<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Siswa;
use App\Models\NilaiAkhirSiswa;
class NilaiSiswa extends Component
{
    #[Title('Nilai - with Rifaya Education')]
    #[Layout('components.layouts.guest_page')]
    public Siswa $siswa;
    public $myNilai = [];
    public function mount($id =null)
    {
        $this->siswa = Siswa::where('slug',$id)->firstOrFail(); 
        $nilai = [];
       $_s =  NilaiAkhirSiswa::where('siswa_id', $this->siswa->id)->with('mapkelas.kelas')->with('mapkelas.sekolah')->with('label.mapel')->get();
    
       foreach($_s as $v){ 
            $kelas = $v->mapkelas->kelas->title." ".$v->mapkelas->title." (". $v->mapkelas->kelas->jenjang->title.") - "  .$v->mapkelas->sekolah->nama_sekolah ;
            if(!isset( $nilai[$kelas])) $nilai[$kelas] = [];
            $nilai[$kelas][] = $v;
       }
       $this->myNilai = $nilai;
    }
    public function render()
    {
        abort(405, 'Page Expired');
        return view('livewire.front.nilai-siswa');
    }
}
