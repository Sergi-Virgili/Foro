<?php

namespace App\Providers;

use App\Area;
use App\Theme;
use App\Response;
use App\Observers\AreaObserver;
use App\Observers\ThemeObserver;
use App\Observers\ResponseObserver;
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
        Area::observe(AreaObserver::class);
        Theme::observe(ThemeObserver::class);
        Response::observe(ResponseObserver::class);
    }
}
