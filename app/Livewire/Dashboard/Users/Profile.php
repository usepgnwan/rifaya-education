<?php

namespace App\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Profile extends Component
{
    #[Layout('components.layouts.account_page')]
    public $breadcumb = [];
    public $user;

    public function mount($username = null)
    {

       $this->user = User::where('username', $username)
        ->with('user_profile')
        ->with('user_experiences')
        ->with('mata_pelajaran')
        ->with('kelas')
        ->with('user_metodemengajar')
        ->with('user_waktu')
        ->with('user_jam_ajar')
        ->firstOrFail();
       $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Users' =>  [
                'active' => false,
                'route_name' => 'account.users'
            ]
        ];
    }
    public function render()
    {
        $breadcumb = $this->breadcumb;
        $user = $this->user;
        return view('livewire.dashboard.users.profile', compact('breadcumb','user'));
    }
}
