<?php

namespace Udemy\Laravel\Tests\Integration\Model;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Model\User;
use Udemy\Laravel\Tests\TestCase;

class UserTest extends TestCase
{

    public function testGetAll()
    {
        $config = Config::get('udemy');

        $users = new User();
        $users = $users->get();

        $this->assertNotEmpty($users);
    }
}