<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TeacherPageRegister extends Component
{
    #[Title('Registrasi Pengajar')]
    #[Layout('components.layouts.guest_page')]
    public function render()
    {
        return view('livewire.front.teacher-page-register');
    }
}
