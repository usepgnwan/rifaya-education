<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(255);
        Component::macro('notify', function ($message, $type = 'success',$type1 = 'notify') {
            $msg = ['message'=>$message, 'type'=> $type];
            if($type1 == 'notify'){
                $this->dispatch('notify', $msg);
            }else if($type1 == 'flash'){
                session()->flash('notify', $msg);
            }
        });
        $this->app->bind('auth.user', function () {
            return Auth::user();
        });
    }
}
