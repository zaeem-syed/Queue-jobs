<?php

namespace App\Providers;

use App\Models\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //this is option 1 to share data with every view
        // takes two parameters one is the key and the other is what u really want to share
        //View::share('channel',Channel::orderBy('name')->get());

        // Second option
        View::composer(['post','Channel'], function($view){
            $view->with('channel',Channel::orderBy('name')->get());

        });
    }
}
