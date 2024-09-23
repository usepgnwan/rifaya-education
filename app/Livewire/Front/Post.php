<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\Kelas;
use Livewire\Attributes\On;
use Livewire\Component;

class Post extends Component
{
    public $search = '';
    public $kelas = '';
    public $kategori = '';

    // event dari select
    #[On('kelas')]
    public function updateKelas($value){
        $this->kelas = $value;
    }
    #[On('kategori')]
    public function updateKategori($value){
        $this->kategori = $value;
    }


    public function mount(){
        if( isset(request()->kategori) &&  request()->kategori != '' ){
            $this->kategori = Category::where( 'title',request()->kategori)->first()->id;
        }
        if( isset(request()->kelas) &&  request()->kelas != '' ){
            $this->kategori = Kelas::where( 'title',request()->kelas)->first()->id;
        }
        if( isset(request()->search) &&  request()->search != '' ){
            $this->search = request()->search;
        }
    }


    public function postFilter()
    {
        // Dispatch the event when search is updated
        return $this->dispatch('postFilter', [
            'search' => $this->search,
            'kelas' => $this->kelas,
            'kategori' => $this->kategori,
        ]);
    }


    public function render()
    {
        $_kelas = \App\Models\Kelas::get();
        $_kategori = \App\Models\Category::all();
        $search = $this->search;
        $kelas = $this->kelas;
        $kategori = $this->kategori;
        return view('livewire.front.post', compact('_kelas','_kategori','search','kelas','kategori'))->title('Blog');
    }
}
