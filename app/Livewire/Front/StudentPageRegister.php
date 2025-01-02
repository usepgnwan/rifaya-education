<?php

namespace App\Livewire\Front;

use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class StudentPageRegister extends Component
{

    #[Title('Les Private Siswa')]
    #[Layout('components.layouts.guest_page')]

    public $form = [
        'name' => '',
        'email' => '',
        'user_affiliate_id' => null
        // 'password' => '',
        // 'repeat_password' => '',
    ];

    public $profile = [
        'no_telp' => '',
        'asal_sekolah' => '',
        'alamat_domisili' => '',
    ];

    public $mapel = [];
    public $kelas = [];

    public function mount($token = null){
        if(!is_null($token)){
            try {
                // Decrypt the value
                $decryptedValue = Crypt::decrypt($token);
                $user = User::whereHas('my_affiliate',function($q) use ($decryptedValue){
                    return $q->where('user_affiliate_id','=',$decryptedValue);
                })->FirstOrFail();
                $this->form['user_affiliate_id'] = $decryptedValue;
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                // Handle the decryption error
                abort(404);
            }
        }
    }
    public function rules(){

        return [
            'form.name' => 'required|min:3',
            'form.email' => 'required|email:dns|unique:users,email',
            // 'form.password' => 'required|min:6',
            'profile.no_telp' => 'required|numeric',
            'profile.alamat_domisili' => 'required',
            'profile.asal_sekolah' => 'required',
            'mapel' => 'array|min:1',
            // 'form.repeat_password' => 'required|same:form.password',
        ];
    }
    public function validationAttributes()
    {
        return [
            'form.name' => 'Nama Pengguna',
            'form.email' => 'Alamat Email',
            // 'form.password' => 'Password',
            // 'form.repeat_password' => 'Ulangi Password',
            'profile.no_telp' => 'No. Telp/wa',
            'mapel' => 'Mata Pelajaran',
            'profile.alamat_domisili' => 'Alamat Domisili',
            'profile.asal_sekolah' => 'Asal Sekolah',

        ];
    }
    public function save(){
        try{
            $this->validate();
            $username = explode('@', $this->form['email'])[0];
            $this->form['username'] = $username;
            $this->form['password'] = bcrypt('password');
            $this->form['status'] = 'register';
            unset($this->form['repeat_password']);
            $user = User::create($this->form);
            $user->kelas()->sync($this->kelas);
            $user->mata_pelajaran()->sync($this->mapel);
            $user->roles()->sync([3]);
            $user->user_profile()->create($this->profile);
            $this->notify('Registrasi Berhasil.Tim kami akan menghubungi anda. ', 'success', 'flash');
            $this->reset('form');
            // redirect()->route('login');
            session()->flash('success', $user->name);
        }catch (\Illuminate\Validation\ValidationException $e){
            $this->notify('Periksa kembali formulir anda','warning');
            throw $e;
        }
    }
    public function render()
    {
        $mapel = MataPelajaran::all();
        $_kelas = Kelas::all();
        return view('livewire.front.student-page-register'
       , ['mata_pelajarans' => $mapel, "_kelas" => $_kelas]);
    }
}
