<?php

namespace Udemy\Laravel\Tests\Integration\Model;

use Illuminate\Support\Facades\Config;
use Udemy\Laravel\Model\Course;
use Udemy\Laravel\Tests\TestCase;

class CourseTest extends TestCase
{
    public function testGetAll()
    {
        $config = Config::get('udemy');

        $course = new Course();
        $course = $course->get();

        $this->assertNotEmpty($course);
    }
}