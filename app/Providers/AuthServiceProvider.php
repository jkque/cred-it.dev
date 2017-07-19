<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Auth\CustomUserProvider as CustomUserProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('custom', function($app, $config) {
            $connection = $app['db']->connection();
            return new CustomUserProvider($connection, $app['hash'], $config['table'], $config['auth_id']);
        });
    }
}
