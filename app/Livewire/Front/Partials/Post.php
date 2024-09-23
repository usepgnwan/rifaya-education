<?php

namespace App\Livewire\Front\Partials;

use App\Models\Post as ModelsPost;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{

    use WithPagination;
    #[Lazy()]

    public $search = '';
    public $kelas = '';
    public $kategori = '';


    #[On('postFilter')]


    public function updateFilters($postFilter)
    {

        $this->resetPage();
        $this->search = $postFilter['search'];
        $this->kelas = $postFilter['kelas'];
        $this->kategori = $postFilter['kategori'];

    }


    public function placeholder(){
        return view('livewire.front.partials.sceleton.post');
    }
    public function render()
    {
        // dd($this);
        $post = new ModelsPost();
        $data = $post
        ->when($this->search, function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')->orWhere('body', 'like', '%' . $this->search . '%');
        })
        ->with('kelas.jenjang')
        ->when($this->kelas, function ($query) {
            return $query->whereHas('kelas', function ($query) {
                return $query->where('id', $this->kelas);
            });
        })
        ->with('materi')
        ->with('kategori')
        ->when($this->kategori, function ($query) {
            return $query->where('category_id', $this->kategori);
        })
        ->latest()->paginate(12);

        return view('livewire.front.partials.post', compact('data'));
    }
}
