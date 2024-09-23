<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Blog extends Component
{

    #[Layout('components.layouts.account_page')]
    public array $breadcumb = [];

    public function mount(){

        $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Blog' =>  [
                'active' => false,
                'route_name' => ''
            ]
        ];
    }
    public function render()
    {
        return view('livewire.dashboard.blog', [
            'breadcumb' => $this->breadcumb
        ]);
    }
}
