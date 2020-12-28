<?php

namespace Udemy\Laravel\Api;

class UserCourse extends Api
{
    const properties = [
        "user_name",
        "user_surname",
        "user_email",
        "user_role",
        "user_external_id",
        "course_id",
        "course_title",
        "course_category",
        "course_duration",
        "completion_ratio",
        "num_video_consumed_minutes",
        "course_enroll_date",
        "course_start_date",
        "course_completion_date",
        "course_first_completion_date",
        "course_last_accessed_date",
        "is_assigned",
        "assigned_by",
        "user_is_deactivated",
        "lms_user_id",
    ];
}
