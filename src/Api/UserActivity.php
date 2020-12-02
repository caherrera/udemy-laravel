<?php

namespace Udemy\Laravel\Api;

class UserCourseActivity extends Api
{
    const properties = [
        "count",
        "next",
        "previous",
        "results" => [
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
        ],
    ];
}
