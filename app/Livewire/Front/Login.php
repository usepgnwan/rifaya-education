<?php

namespace App\Livewire\Front;


use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login')]
    #[Layout('components.layouts.guest_page')]
    public   LoginForm $form;
    public function login() {
        $this->form->store();
    }
    public function render()
    {
        // dd(auth()->user() );
        // die;
        return view('livewire.login');
    }
}
