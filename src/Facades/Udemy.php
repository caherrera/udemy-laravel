<?php

namespace Udemy\Laravel\Facades;

use Udemy\Laravel\Api\Course;
use Illuminate\Support\Facades\Facade;

/**
 * Class Udemy
 *
 * @package Udemy\Laravel\Facades
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
