<?php

namespace Udemy\Laravel\Tests\Integration\Model;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Model\UserActivity;
use Udemy\Laravel\Tests\TestCase;

class UserActivityTest extends TestCase
{
    public function testGetOne()
    {
        $config = Config::get('udemy');

        $user_activity = new UserActivity();
        $user_activity = $user_activity->first('carlos.herreracaceres@cencosud.cl');

        $this->assertNotEmpty($user_activity);
    }

    public function testGetAll()
    {
        $config = Config::get('udemy');

        $user_activity = new UserActivity();
        $user_activity = $user_activity->get();

        $this->assertNotEmpty($user_activity);
    }
}