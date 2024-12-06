<?php

namespace App\Livewire\Front;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Livewire\Component;

class AffiliateRegister extends Component
{
    #[Title('Affiliate Registrasi')]
    #[Layout('components.layouts.guest_page')]


    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        // 'repeat_password' => '',
    ];


    public $profile = [
        'no_telp' => '',
    ];
    public $mapel = [];
    public $kelas = [];

    public function rules(){

        return [
            'form.name' => 'required|min:3',
            'form.email' => 'required|email:dns|unique:users,email',
            'form.password' => 'required|min:6',
            'profile.no_telp' => 'required|numeric',
        ];
    }
    public function validationAttributes()
    {
        return [
            'form.name' => 'Nama Pengguna',
            'form.email' => 'Alamat Email',
            'form.password' => 'Password',
            'profile.no_telp' => 'No. Telp/wa',
            // 'form.repeat_password' => 'Ulangi Password',

        ];
    }
    public function save(){
        try{
            $this->validate();
            $username = explode('@', $this->form['email'])[0];
            $this->form['username'] = $username;
            $this->form['password'] = bcrypt($this->form['password']);
            $this->form['status'] = 'aktif';

            // unset($this->form['repeat_password']);
            $user = User::create($this->form);
            $user->roles()->sync([5]);
            $user->my_affiliate()->create(['user_affiliate_id'=>'REAFF-' . Str::random(5)]);
            $user->user_profile()->create($this->profile);
            $this->notify('Registrasi Affiliate Berhasil.', 'success', 'flash');
            $this->reset('form');
            // redirect()->route('login');
            $encryptedValue = Crypt::encrypt($user->my_affiliate->user_affiliate_id);
            session()->flash('success', $user->name);
            session()->flash('token', $encryptedValue);
        }catch (\Illuminate\Validation\ValidationException $e){
            $this->notify('Periksa kembali formulir anda','warning');
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.front.affiliate-register');
    }
}
