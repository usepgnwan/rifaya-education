<?php

namespace App\Livewire\Front;

use App\Models\Faq;
use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('Tentang')]
    public function render()
    {

        $faq = Faq::all();
        return view('livewire.front.about',compact('faq'));
    }
}
