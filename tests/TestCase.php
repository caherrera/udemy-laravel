<?php

namespace Udemy\Laravel\Tests;

use Udemy\Laravel\UdemyServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Orchestra\Testbench\Concerns\CreatesApplication;

class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function getPackageProviders($app)
    {
        return [
            UdemyServiceProvider::class,
        ];
    }

    /**
     * Define the environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetup($app)
    {
        $config = $app['config'];

        // Laravel database setup.
        $config->set('database.default', 'testbench');
        $config->set(
            'database.connections.testbench',
            [
                'driver'   => 'sqlite',
                'database' => ':memory:',
                'prefix'   => '',
            ]
        );
    }
}
