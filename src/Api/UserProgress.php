<?php

namespace Udemy\Laravel\Api;

use Illuminate\Support\Str;

class UserProgress extends Api
{
    const properties = [
        'user_email',
        'course_id',
        'course_title',
        'item_title',
        'user_name',
        'user_surname',
        'user_role',
        'user_is_deactivated',
        'item_type',
        'item_id',
        'item_start_time',
        'item_completion_time',
        'item_views',
        'item_completion_ratio',
        'item_final_result',
        'item_marked_complete',
        'course_category'
    ];

    public function get($id = null)
    {
        return $this->processRequest('get', $this->prepareGetUrl());
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
