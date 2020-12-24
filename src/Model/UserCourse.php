<?php

namespace Udemy\Laravel\Model;

use Udemy\Laravel\Api\UserCourse as Api;

/**
 * Class UserCourseActivity
 *
 * @package Udemy\Laravel\Model
 *
 * @property-read user_name
 * @property-read user_surname
 * @property-read user_email
 * @property-read user_role
 * @property-read user_external_id
 * @property-read course_id
 * @property-read course_title
 * @property-read course_category
 * @property-read course_duration
 * @property-read completion_ratio
 * @property-read num_video_consumed_minutes
 * @property-read course_enroll_date
 * @property-read course_start_date
 * @property-read course_completion_date
 * @property-read course_first_completion_date
 * @property-read course_last_accessed_date
 * @property-read is_assigned
 * @property-read assigned_by
 * @property-read user_is_deactivated
 * @property-read lms_user_id
 */

class UserCourse extends Model
{
    protected $fillable = Api::properties;
}
