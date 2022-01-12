<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use App\User;
use App\deskripsiFokus;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('super-admin', function(User $user){
            return $user->role === 'Super Admin';
        });

        $data_fokus_riset = deskripsiFokus::all();
        View::share('data_fokus_riset',$data_fokus_riset); 

    }
}
