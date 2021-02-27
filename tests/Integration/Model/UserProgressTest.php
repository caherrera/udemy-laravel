<?php

namespace Udemy\Laravel\Tests\Integration\Model;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Model\UserProgress;
use Udemy\Laravel\Tests\TestCase;

class UserProgressTest extends TestCase
{

    public function testGetOne()
    {
        $config = Config::get('udemy');

        $user_progress = new UserProgress();
        $user_progress = $user_progress->first('carlos.herreracaceres@cencosud.cl');

        $this->assertNotEmpty($user_progress);
    }
}