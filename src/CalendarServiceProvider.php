<?php

namespace KenNebula\Calander;

use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('KenNebula\Calander\CalendarController');
        $this->app->make('KenNebula\Calander\CalendarService');
        $this->loadViewsFrom(__DIR__.'/views', 'calendar');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
    }
}
