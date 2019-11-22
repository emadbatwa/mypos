<?php

namespace App\Providers;

use App\Twitter;
use Illuminate\Support\ServiceProvider;

class SoicalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(Twitter::class , function (){
            return new Twitter(config('services.twitter.secret'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
