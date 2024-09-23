<?php

namespace App\Livewire\Front\Partials;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Contact extends Component
{
    #[Lazy]
    public function placeholder(){
        return view('livewire.front.partials.sceleton.contact');
    }
    public function render()
    {
        return view('livewire.front.partials.contact');
    }
}
