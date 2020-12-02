<?php

namespace Udemy\Laravel\Api;

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
}
