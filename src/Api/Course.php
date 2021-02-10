<?php

namespace Udemy\Laravel\Api;

use Illuminate\Support\Str;

class Course extends Api
{
    const properties = [
        "_class",
        "id",
        "title",
        "description",
        "url",
        "estimated_content_length",
        "categories",
        "num_lectures",
        "num_videos",
        "promo_video_url",
        "instructors",
        "requirements",
        "what_you_will_learn",
        "images",
        "mobile_native_deeplink",
        "locale",
        "is_practice_test_course",
        "primary_category",
        "primary_subcategory",
        "num_quizzes",
        "num_practice_tests",
        "has_closed_caption",
        "caption_languages",
        "caption_locales",
        "estimated_content_length_video",
    ];

    public function get($id = null)
    {
        return $this->processRequest('get', $this->prepareGetUrl($id), []);
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

    public function all()
    {
        $page    = 1;
        $size    = 25;
        $courses = collect();
        do {
            $response = $this->processRequest('get', $this->prepareGetUrl(), []);
            $courses->merge($response['results'] ?? []);
        } while ($page <= intdiv($response['count'], $size) + 1);

        return $courses->toArray();
    }
}
