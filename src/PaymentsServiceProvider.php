<?php

namespace Mueva\Payments;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        $configFile = realpath(__DIR__ . '/../config/payments.php');
//        $migrationPath = realpath(__DIR__ . '/../migrations/');

//        $this->publishes([$configFile => config_path('payments.php')]);
//        $this->mergeConfigFrom($configFile, 'settings');
//        $this->loadMigrationsFrom($migrationPath);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton(Payments::class, function ($app) {
//            $settings = new Payments;
//            return $settings;
//        });
    }
}
