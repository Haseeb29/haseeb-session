<?php

namespace Haseeb\Session;

use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('weather', function ($app) {
            return new Weather();
        });
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'weather');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'session');
        $this->publishes([__DIR__ . '/config/config.php' => config_path('weather.php')], 'config');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
