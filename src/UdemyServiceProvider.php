<?php

namespace Udemy\Laravel;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Udemy\Laravel\Commands\Console\Create;
use Udemy\Laravel\Commands\Console\GetLink;
use Udemy\Laravel\Commands\Console\Links;

class UdemyServiceProvider extends ServiceProvider
{
    /**
     * Run service provider boot operations.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->isLumen()) {
            return;
        }

        if ($this->app->runningInConsole()) {
            $config = __DIR__.'/Config/config.php';

            $this->publishes(
                [
                    $config => config_path('Udemy.php'),
                ]
            );
            $this->commands([Create::class,Links::class,GetLink::class]);
        }
    }

    /**
     * Determines if the current application is a Lumen instance.
     *
     * @return bool
     */
    protected function isLumen()
    {
        return Str::contains($this->app->version(), 'Lumen');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind the contract to the object
        // in the IoC for dependency injection.
        $this->app->singleton(
            'Udemy',
            function (Container $app) {
                $config = $app->make('config')->get('Udemy');

                // Verify configuration exists.
                if (is_null($config)) {
                    $message = 'Udemy configuration could not be found. Try re-publishing using `php artisan vendor:publish`.';

                    throw new \RuntimeException($message);
                }

                return new Udemy($config);
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Udemy'];
    }

    /**
     * Determines whether logging is enabled.
     *
     * @return bool
     */
    protected function isLogging()
    {
        return Config::get('Udemy.logging', false);
    }
}
