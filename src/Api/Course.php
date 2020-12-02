<?php

namespace Udemy\Laravel\Api;

class Course extends Api
{
    const properties = [
        "count",
        "next",
        "previous",
        "results" => [
            "_class",
            "id",
            "title",
            "description",
            "url",
            "estimated_content_length",
            "categories" => [],
            "num_lectures",
            "num_videos",
            "promo_video_url" => [],
            "instructors" => [],
            "requirements" => [
                "list" => []
            ],
            "what_you_will_learn" => [
                "list" => []
            ],
            "images" => [
                "size_48x27",
				"size_50x50",
				"size_75x75",
				"size_96x54",
				"size_100x100",
				"size_125_H",
				"size_200_H",
				"size_240x135",
				"size_304x171",
				"size_480x270",
				"size_750x422",
            ],
            "mobile_native_deeplink",
            "locale" => [
                "_class",
                "locale"
            ],
            "is_practice_test_course",
            "primary_category" => [
                "_class",
				"id",
				"title",
				"url",
				"icon_class",
				"type",
				"title_cleaned",
				"channel_id",
            ],
            "primary_subcategory" => [
                "_class",
                "id",
                "title",
                "url",
                "icon_class",
                "type",
                "title_cleaned",
                "channel_id",
            ],
            "num_quizzes",
            "num_practice_tests",
            "has_closed_caption",
            "caption_languages",
            "caption_locales" => [
                "_class",
                "locale",
                "title",
                "english_title"
            ],
            "estimated_content_length_video",
        ],
    ];
}
