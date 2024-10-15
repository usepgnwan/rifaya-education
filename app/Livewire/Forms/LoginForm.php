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

        // $login = $request->email;
        $fieldType = filter_var($this->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';


        if(Auth::attempt([$fieldType => $this->email, 'password' => $this->password])){
            if (auth()->check()) {
                $path = strtolower(str_replace(' ', '_', auth()->user()->name)) . '/';
                // Set the cookie with a name of your choice, e.g., '_path_cookie'
                setcookie('_path_cookie', $path, time() + (86400 * 30), "/"); // Cookie expires in 30 days
            } else {
                // Optionally, you can unset the cookie if the user is not authenticated
                setcookie('_path_cookie', '', time() - 3600, "/"); // Unset the cookie
            }
            return redirect()->route('account.dashboard');
        }

        throw ValidationException::withMessages([
            'form.email' => 'The provided credentials do not match our records.',
        ]);
    }
}
