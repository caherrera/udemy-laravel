<?php

namespace Udemy\Laravel\Model;

use Udemy\Laravel\Api\UserCourse as Api;

/**
 * Class UserCourseActivity.
 *
 * @property user_name
 * @property user_surname
 * @property user_email
 * @property user_role
 * @property user_external_id
 * @property course_id
 * @property course_title
 * @property course_category
 * @property course_duration
 * @property completion_ratio
 * @property num_video_consumed_minutes
 * @property course_enroll_date
 * @property course_start_date
 * @property course_completion_date
 * @property course_first_completion_date
 * @property course_last_accessed_date
 * @property is_assigned
 * @property assigned_by
 * @property user_is_deactivated
 * @property lms_user_id
 */
class UserCourse extends Model
{
    protected $fillable = Api::properties;
}
