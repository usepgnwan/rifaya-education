<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class StudentPageRegister extends Component
{

    #[Title('Registrasi')]
    #[Layout('components.layouts.guest_page')]
    public function render()
    {
        return view('livewire.front.student-page-register');
    }
}
