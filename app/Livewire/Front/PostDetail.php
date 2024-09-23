<?php

namespace App\Livewire\Front;

use App\Models\Kelas;
use App\Models\Post;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;

class PostDetail extends Component
{
    #[Title('Blog Detail')]
    #[Lazy]
    public $slug;
    public $post;

    public function boot(Post $post){
        $this->post = $post;
    }
    public function mount($slug = null )
    {
        $this->slug = $slug;

    }
    public function render()
    {

        $detail = $this->post->where('slug', $this->slug)
        ->with(['kelas.jenjang' => function ($query) {
            $query->select('id', 'title');
        }])
        ->with('kategori')
        ->with(['materi' => function ($query) {
            $query->select('id', 'title');
        }])
        ->firstOrFail();
        // dd($detail);
        $this->dispatch('swiperInitialized');
        return view('livewire.front.post-detail', compact('detail'));
    }
}
