<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        Paginator::useBootstrap();
        Gate::define('admin', function (User $user) {
            return $user->level === 'admin';
        });

        Gate::define('bidan', function (User $user) {
            return $user->level === 'bidan' || $user->level === 'admin';
        });

        Gate::define('ortu', function (User $user) {
            return $user->level === 'ortu';
        });
    }
}
