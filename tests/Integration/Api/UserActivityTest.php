<?php

namespace Udemy\Laravel\Tests\Integration\Api;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Api\UserActivity;
use Udemy\Laravel\Tests\TestCase;
use Udemy\Laravel\Udemy;

class UserActivityTest extends TestCase
{

    public function testGetOne()
    {
        $config = Config::get('udemy');
        $udemy = new Udemy($config);
        $user_activity = $udemy->user_activities();
        $this->assertInstanceOf(UserActivity::class, $user_activity);

        $response = $user_activity->get('carlos.herreracaceres@cencosud.cl');

        $this->assertNotEmpty($response);
    }

    public function testGet()
    {
        $config = Config::get('udemy');
        $udemy = new Udemy($config);
        $user_activity = $udemy->user_activities();
        $this->assertInstanceOf(UserActivity::class, $user_activity);

        $response = $user_activity->get();

        $this->assertNotEmpty($response);
    }
}