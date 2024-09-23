<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Dashboard extends Component
{
    #[Layout('components.layouts.account_page')]
    public array $breadcumb = [];

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
        return view('livewire.dashboard.dashboard', [
            'breadcumb' => $this->breadcumb
        ]);
    }
}
