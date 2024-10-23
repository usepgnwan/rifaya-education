<?php

namespace App\Livewire\Front;

use App\Livewire\Forms\Register\Teachers;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TeacherPageRegister extends Component
{
    use Teachers;
    #[Title('Registrasi Pengajar')]
    #[Layout('components.layouts.guest_page')]

    // public Teachers $form;
    // public function register(){
    //     $this->form->save();
    // }
    public function render()
    {
        return view('livewire.front.teacher-page-register');
    }
}
