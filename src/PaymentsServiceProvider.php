<?php

namespace Mueva\Payments;

use Illuminate\Support\ServiceProvider;

class PaymentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configFile = realpath(__DIR__ . '/../config/payments.php');

        $this->publishes([$configFile => config_path('payments.php')]);
        $this->mergeConfigFrom($configFile, 'payments');
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../migrations/'));
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
