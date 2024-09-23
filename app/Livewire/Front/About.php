<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('Tentang')]
    public function render()
    {
        return view('livewire.front.about');
    }
}
