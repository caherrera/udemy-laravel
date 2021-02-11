<?php

namespace Udemy\Laravel\Tests\Integration\Api;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Api\User;
use Udemy\Laravel\Tests\TestCase;
use Udemy\Laravel\Udemy;

class UserTest extends TestCase
{

    public function testGetOne()
    {
        $config = Config::get('udemy');
        $udemy = new Udemy($config);
        $users = $udemy->users();
        $this->assertInstanceOf(User::class, $users);

        $response = $users->get('carlos.herreracaceres@cencosud.cl');

        $this->assertNotEmpty($response);
    }

    public function testGet()
    {
        $config = Config::get('udemy');
        $udemy = new Udemy($config);
        $users = $udemy->users();
        $this->assertInstanceOf(User::class, $users);

        $response = $users->get();

        $this->assertNotEmpty($response);
    }
}