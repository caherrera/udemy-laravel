<?php

namespace Udemy\Laravel\Api;

use Illuminate\Support\Str;

class User extends Api
{
    const properties = [
        "user_name",
        "user_surname",
        "user_email",
        "user_role",
        "user_external_id",
        "user_is_deactivated",
        "num_new_enrolled_courses",
        "num_new_assigned_courses",
        "num_new_started_courses",
        "num_completed_courses",
        "num_completed_lectures",
        "num_completed_quizzes",
        "num_video_consumed_minutes",
        "num_web_visited_days",
        "last_date_visit",
    ];

    public function get($id = null)
    {
        return $this->processRequest('get', $this->prepareGetUrl(), $id ? ['user_email' => $id] : []);
    }

    public function prepareGetUrl($id = null)
    {
        $ref      = Str::lower($this->className());
        $name     = 'list';
        $config   = $this->getConfig();
        $endpoint = $config['endpoints'][$ref][$name]['endpoint'];
        $url      = $this->getPath($endpoint, $id);

        return $url;
    }
}
