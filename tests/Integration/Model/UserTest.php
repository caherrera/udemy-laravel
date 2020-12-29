<?php

namespace Udemy\Laravel\Tests\Integration\Model;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Model\User;
use Udemy\Laravel\Tests\TestCase;

class UserTest extends TestCase
{

    public function testGetOne()
    {
        $config = Config::get('udemy');

        $user = new User();
        $user = $user->first('carlos.herreracaceres@cencosud.cl');

        $this->assertNotEmpty($user);
    }
}