<?php

namespace App\Livewire\Front\Page;

use Illuminate\Http\Request;
use Livewire\Component;

class RegistrasiTeacher extends Component
{
    public $name = '';
    public function mount(){
       $sess = session()->get('name');
       if($sess == null){
           return redirect()->route('home');
       }
       $this->name = session()->get('name');
    }
    public function render()
    {
        return view('livewire.front.page.registrasi-teacher');
    }
}
