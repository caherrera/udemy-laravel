<?php

namespace Udemy\Laravel\Tests\Integration\Api;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Api\Course;
use Udemy\Laravel\Tests\TestCase;
use Udemy\Laravel\Udemy;

class CourseTest extends TestCase
{

    public function testGetOne()
    {
        $config = Config::get('udemy');
        $udemy  = new Udemy($config);
        $courses  = $udemy->courses();
        $this->assertInstanceOf(Course::class, $courses);

        $response = $courses->get(2360128);

        $this->assertNotEmpty($response);
    }


    public function testGetAll()
    {
        $config = Config::get('udemy');
        $udemy  = new Udemy($config);
        $courses  = $udemy->courses();
        $this->assertInstanceOf(Course::class, $courses);

        $response = $courses->all();

        $this->assertNotEmpty($response);
    }
}