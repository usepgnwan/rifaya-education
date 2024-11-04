<?php

namespace App\Livewire\Front;

use App\Livewire\Forms\Register\Teachers;
use App\Models\Kelas;
use App\Models\MataPelajaran;
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

        abort(406, 'Page Expired');
        $mapel = MataPelajaran::all();
        $_kelas = Kelas::all();
        return view('livewire.front.teacher-page-register', ['mata_pelajarans' => $mapel, "_kelas" => $_kelas]);
    }
}
