<?php namespace Innesm4\LaravelSharpspring;

use Illuminate\Support\ServiceProvider;

class LaravelSharpspringServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/sharpspring.php' => config_path('sharpspring.php')], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/sharpspring.php', 'sharpspring');
        $this->app->singleton(LaravelSharpspring::class, function ($app) {
            $config = $app->make('config')->get('sharpspring');
            return new LaravelSharpspring($config['accountID'], $config['secretKey']);
        });

        $this->app->alias(LaravelSharpspring::class, 'laravel-sharpspring');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */

    public function provides()
    {
        return ['laravel-sharpspring', LaravelSharpspring::class];
    }
}