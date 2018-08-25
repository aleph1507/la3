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
        Schema::defaultStringLength(191);
        // if(env('REDIRECT_HTTPS')!=='local'){
        //   \URL::forceScheme('https');
        // }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      // if(env('REDIRECT_HTTPS')!=='local'){
      //   $this->app['request']->server->set('HTTPS', true);
      // }
    }
}
