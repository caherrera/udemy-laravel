<?php

namespace Udemy\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Udemy\Laravel\Api\Course;

/**
 * Class Udemy.
 *
 * @method Course courses();
 */
class Udemy extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'udemy';
    }
}
