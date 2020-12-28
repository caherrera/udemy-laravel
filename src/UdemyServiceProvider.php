<?php

namespace Udemy\Laravel;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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

            if ( ! $this->app->runningUnitTests()) {
                $this->publishes([$config => config_path('udemy.php')]);
            } else {
                $this->mergeConfigFrom($config, 'udemy');
            }
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
            'udemy',
            function (Container $app) {
                $config = $app->make('config')->get('udemy');

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
        return ['udemy'];
    }

    /**
     * Determines whether logging is enabled.
     *
     * @return bool
     */
    protected function isLogging()
    {
        return Config::get('udemy.logging', false);
    }
}
