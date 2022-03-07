<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use DB;
use App\Composers\HomeComposer;
use App\Models\Contact;
use App\Models\Songs;
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

        view::composer('*', function ($allsongs) {
            $all_songs = Songs::all()->take(2);
            $allsongs->with('allsongs', $all_songs);
        });
    }
}
