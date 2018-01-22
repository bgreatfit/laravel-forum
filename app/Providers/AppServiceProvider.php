<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $channels = \Cache::rememberForever('channels', function() {
//            return Channel::all();
//        });
//        \View::composer(['create'],function($view){
//            $channels = \Cache::rememberForever('channels', function() {
//            return Channel::all();
//        });
//            $view->with('channels',$channels);
//        });
        \View::composer('*',function($view) {
            $view->with('channels', \App\Channel::all());
            // \View::share('channels',\App\Channel::all());
            Schema::defaultStringLength(191);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
