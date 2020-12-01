<?php

namespace Udemy\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Udemy\Laravel\Api\Domain;

/**
 * Class Udemy
 *
 * @package Udemy\Laravel\Facades
 * @method Domain domains();
 */
class Udemy extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'Udemy';
    }
}
