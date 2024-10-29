<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Sop extends Component
{
    #[Title('SOP Rifaya Education')]
    #[Layout('components.layouts.guest_page')]
    public function render()
    {
        return view('livewire.front.sop');
    }
}
