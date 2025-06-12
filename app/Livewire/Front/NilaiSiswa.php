<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
class NilaiSiswa extends Component
{
    #[Title('Nilai - with Rifaya Education')]
    #[Layout('components.layouts.guest_page')]
    public function render()
    {
        return view('livewire.front.nilai-siswa');
    }
}
