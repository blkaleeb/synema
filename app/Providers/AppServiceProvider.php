<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\Composers\HomeComposer;
use App\Models\Contact;
use Illuminate\Support\Facades\Blade;

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
        View::composer(
            '*',
            HomeComposer::class
        );
        // View::share('compro',);
    }
}
