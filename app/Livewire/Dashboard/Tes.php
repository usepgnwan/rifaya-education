<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Tes extends Component
{
    #[Layout('components.layouts.account_page')]
    public array $breadcumb = [];
    #[Rule('required')]
    public string $name = '';
    use WithFileUploads;
    #[Rule('required')]
    public string $last_name = '';

    public $file;




    public function uploadFile()
    {
        // dd($this->file);
        // Validate the file
        $this->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);


        // If validation passes, store the file
        // $path = $this->file->store('uploads');
        // session()->flash('message', 'File uploaded successfully: ' . $path);
    }
    public function loginView(){
        return view('livewire.dashboard.test');
    }
    public function mount(){

        $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Dashboard' =>  [
                'active' => false,
            ]
        ];
    }
    public function render()
    {
        return view('livewire.dashboard.tes', [
            'breadcumb' => $this->breadcumb
        ]);
    }
}
