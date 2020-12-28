<?php

namespace Udemy\Laravel\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Udemy\Laravel\Facades\Udemy;
use Udemy\Laravel\UdemyServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [UdemyServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['udemy' => Udemy::class,];
    }
}
