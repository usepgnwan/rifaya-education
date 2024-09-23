<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Title;
use Livewire\Component;

class TeacherJoin extends Component
{
    #[Title('Jadi Pengajar')]
    public function render()
    {
        return view('livewire.front.teacher-join');
    }
}
