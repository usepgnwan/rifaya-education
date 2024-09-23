<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function store(){


        if(Auth::attempt($this->validate())){
            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'form.email' => 'The provided credentials do not match our records.',
        ]);
    }
}
