<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('hasRole', function (User $user, ...$data) {
            $role= $user->roles->pluck('id')->toArray();
            if(!empty(array_intersect($role, $data))){
                return true;
            }
        });
    }
}
