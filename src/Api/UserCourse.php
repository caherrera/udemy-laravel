<?php

namespace Udemy\Laravel\Api;

use Illuminate\Support\Str;

class UserCourse extends Api
{
    const properties = [
        'user_name',
        'user_surname',
        'user_email',
        'user_role',
        'user_external_id',
        'course_id',
        'course_title',
        'course_category',
        'course_duration',
        'completion_ratio',
        'num_video_consumed_minutes',
        'course_enroll_date',
        'course_start_date',
        'course_completion_date',
        'course_first_completion_date',
        'course_last_accessed_date',
        'is_assigned',
        'assigned_by',
        'user_is_deactivated',
        'lms_user_id',
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
