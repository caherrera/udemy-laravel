<?php

namespace Udemy\Laravel\Tests\Integration;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Api\User;
use Udemy\Laravel\Tests\TestCase;
use Udemy\Laravel\Udemy;

class UserTest extends TestCase
{

    public function testGetOne()
    {
        $config = Config::get('udemy');
        $udemy  = new Udemy($config);
        $users  = $udemy->user();
        $this->assertInstanceOf(User::class, $users);

        $user = $users->get('carlos.herreracaceres@cencosud.cl');

        $this->assertNotEmpty($user);
    }
}