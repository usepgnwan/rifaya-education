<?php

namespace App\Livewire\Forms\Register;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

trait Teachers
{
    use WithFileUploads;
    public $user = [
        'name' => null,
        'email' => null,
        'profile' => null,
    ];

    public $sosmed = [
        'title' => null,
    ];
    public $profile = [
        'no_telp' => null,
        'tanggal_lahir' => null,
        'alamat_domisili' => null,
        'lembaga_saat_ini' => null,
        'kendaraan' => null,
        'perangkat_ajar' => null,
        'sim' => [],
        'cv' => null,
    ];

    public $experience = [
        'title' => null,

    ];

    public $waktu = [];
    public $hari = [];
    public $mapel = [];
    public $kelas = [];

    public $mentoring = [];

    public function rules(){
        return [
            'user.name' => 'required|min:3',
            'user.email' => 'required|email:dns|unique:users,email',
            'user.profile' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
            'profile.no_telp' => 'required|numeric',
            'profile.tanggal_lahir' => 'required',
            'profile.alamat_domisili' => 'required',
            'profile.kendaraan' => 'required',
            'profile.perangkat_ajar' => 'required',
            'profile.cv' => 'required|mimes:pdf|max:5048',
            'profile.sim' => 'required',
            'mapel' => 'required',
            'waktu' => 'required',
            'hari' => 'required',
            'mentoring' => 'required',
            'sosmed.title' => 'required|min:3',
        ];
    }

    public function validationAttributes()
    {
        return [
            'user.name' => 'Nama Lengkap',
            'user.email' => 'Alamat Email',
            'user.profile' => 'Foto Profil',
            'profile.no_telp' => 'Nomor Telepon',
            'profile.tanggal_lahir' => 'Tanggal Lahir',
            'profile.alamat_domisili' => 'Alamat Domisili',
            'profile.kendaraan' => 'Kendaraan',
            'profile.perangkat_ajar' => 'Perangkat Ajar',
            'profile.cv' => 'Curriculum Vitae (CV)',
            'profile.sim' => 'SIM',
            'sosmed.title' => 'Sosial Media',
            'waktu' => 'Jam Ajar',
            'hari' => 'Hari',
            'mapel' => 'Mata Pelajaran',
            'mentoring' => 'Metode Mengajar',
        ];
    }
    public function register()
    {
        $mentoring = [];
        foreach ($this->mentoring as $key => $value) {
            $mentoring[$key]['title'] = $value;
        }

        $hari = [];
        foreach ($this->hari as $key => $value) {
            $hari[$key]['title'] = $value;
        }

        $waktu = [];
        foreach ($this->waktu as $key => $value) {
            $waktu[$key]['title'] = $value;
        }
        try {
            $this->validate();
            $this->profile['sim'] =  implode(', ', $this->profile['sim']);
            $username = explode('@', $this->user['email'])[0];
            $this->user['username'] = $username;
            $this->user['password'] = bcrypt('password');
            $this->user['status'] = 'register';

            if (isset($this->user['profile']) && is_string($this->user['profile']) === false && !is_null($this->user['profile'])) {
                // Check if this is an update and the post has an old image

                // Store the new image
                $this->user['profile'] = $this->user['profile']->store('images', 'public');

                // Generate the URL for the stored image
                $this->user['profile'] = Storage::url($this->user['profile']);
            }

            if (isset($this->profile['cv']) && is_string($this->profile['cv']) === false && !is_null($this->profile['cv'])) {
                // Check if this is an update and the post has an old image

                // Store the new image
                $this->profile['cv'] = $this->profile['cv']->store('files', 'public');

                // Generate the URL for the stored image
                $this->profile['cv'] = Storage::url($this->profile['cv']);
            }

                     // dd($this->profile);
            $user = User::create($this->user);
            // Assign experiences to the user
            // $user->user_experiences()->createMany([$this->experience]);
            $user->user_metodemengajar()->createMany($mentoring);
            $user->user_waktu()->createMany($hari);
            $user->kelas()->sync($this->kelas);
            $user->user_jam_ajar()->createMany($waktu);
            $user->roles()->sync([2]);
            $user->mata_pelajaran()->sync($this->mapel);
            // Assign profile to the user
            $user->user_profile()->create($this->profile);
            $this->reset('user');
            $this->reset('experience');
            $this->reset('profile');

            $this->notify( "Registrasi sukses, tim kami akan menghubungi sesegera mungkin 😊😊.", 'success', 'flash');
            // $this->notify('Registration successful. Please check your email for further instructions.');
                        // Redirect after saving
            return redirect()->route('success.register.teacher')->with('name',  $user->name);

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali formulir Anda.', 'warning');

            throw $e;
        }
    }
}
