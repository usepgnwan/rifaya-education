<?php

namespace App\Livewire\Front;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class StudentPageRegister extends Component
{

    #[Title('Registrasi')]
    #[Layout('components.layouts.guest_page')]

    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'repeat_password' => '',
    ];

    public function rules(){

        return [
            'form.name' => 'required|min:3',
            'form.email' => 'required|email:dns|unique:users,email',
            'form.password' => 'required|min:6',
            'form.repeat_password' => 'required|same:form.password',
        ];
    }
    public function validationAttributes()
    {
        return [
            'form.name' => 'Nama Pengguna',
            'form.email' => 'Alamat Email',
            'form.password' => 'Password',
            'form.repeat_password' => 'Ulangi Password',

        ];
    }
    public function save(){
        try{
            $this->validate();
            $username = explode('@', $this->form['email'])[0];
            $this->form['username'] = $username;
            $this->form['password'] = bcrypt('password');
            $this->form['status'] = 'aktif';

            unset($this->form['repeat_password']);
            $user = User::create($this->form);
            $user->roles()->sync([3]);
            $this->notify('Registrasi Berhasil. lanjut untuk login. ', 'success', 'flash');
            $this->reset('form');
            redirect()->route('login');
        }catch (\Illuminate\Validation\ValidationException $e){
            $this->notify('Periksa kembali formulir anda','warning');
            throw $e;
        }
    }
    public function render()
    {
        return view('livewire.front.student-page-register');
    }
}
