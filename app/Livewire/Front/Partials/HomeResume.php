<?php

namespace App\Livewire\Front\Partials;

use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class HomeResume extends Component
{

    #[Lazy]
    public int $content = 1;

    public function placeholder(){

        $params = [
            "content" => $this->content,
         ];
        return view('livewire.front.partials.sceleton.home-resume',$params);
    }
    public function render()
    {
        $this->dispatch('purecounterInitialized');
        $artikel = Post::where('status','=','published')->where('category_id','=','1')->limit(200)->get()->count();
        $to = Post::where('status','=','published')->where('category_id','=','2')->limit(200)->get()->count();
        $kelas = Post::where('status','=','published')->where('category_id','=','3')->limit(200)->get()->count();
        $bank_soal = Post::where('status','=','published')->where('category_id','=','4')->limit(200)->get()->count();
        $content = $this->content;
        $siswa = 0;
        $guru = 0;
        if(!$content){
            $siswa = User::whereHas('roles', function($query){
                return $query->where('id',3);
            })->limit(200)->get()->count();
            $guru = User::whereHas('roles', function($query){
                return $query->where('id',2);
            })->limit(200)->get()->count();
        }
        return view('livewire.front.partials.home-resume', compact('artikel','to','kelas','bank_soal','content','siswa','guru'));
    }
}
