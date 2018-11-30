<?php

namespace App\Providers\Api_auth_providers;

use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
         $this->app->bind('App\Library\Services\DemoOne', function($app){
	      return new DemoOne();
         });
    }
}
