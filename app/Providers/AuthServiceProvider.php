<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate untuk Admin (hanya admin)
        Gate::define('admin', function ($user) {
            return $user->level === 'admin';
        });

        // Gate untuk Bidan (admin dan bidan)
        Gate::define('bidan', function ($user) {
            return in_array($user->level, ['admin', 'bidan']);
        });
    }
}
