<?php

namespace Udemy\Laravel\Tests\Integration\Api;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Api\UserProgress;
use Udemy\Laravel\Tests\TestCase;
use Udemy\Laravel\Udemy;

class UserProgressTest extends TestCase
{
    public function testGet()
    {
        $config = Config::get('udemy');
        $udemy = new Udemy($config);
        $user_progress = $udemy->user_progress();
        $this->assertInstanceOf(UserProgress::class, $user_progress);

        $response = $user_progress->get();

        $this->assertNotEmpty($response);
    }
}