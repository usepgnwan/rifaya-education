<?php

namespace App\Livewire\Front;

use App\Models\Faq;
use App\Models\Testimoni;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{

    #[Title('Beranda')]
    public function render()
    {
        // $userId = app('session')->get('login_web_' . sha1(config('app.key')));

        // var_dump(auth()->user() );die;
        $faq = Faq::all();
        //get limit 3 testimoni with random order
        $testimoni = Testimoni::limit(6)->where('name', '!=', null)->inRandomOrder()->get();
        return view('livewire.front.home',compact('faq','testimoni'));
    }
}
