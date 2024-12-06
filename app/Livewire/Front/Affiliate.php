<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Title;
use Livewire\Component;

class Affiliate extends Component
{

    #[Title('Affiliate')]
    public function render()
    {
        return view('livewire.front.affiliate');
    }
}
