<?php

namespace Udemy\Laravel\Model;

use Udemy\Laravel\Api\Course as Api;

/**
 * Class Course.
 *
 * @property _class
 * @property id
 * @property title
 * @property description
 * @property url
 * @property estimated_content_length
 * @property categories
 * @property num_lectures
 * @property num_videos
 * @property promo_video_url
 * @property instructors
 * @property requirements
 * @property what_you_will_learn
 * @property images
 * @property mobile_native_deeplink
 * @property locale
 * @property is_practice_test_course
 * @property primary_category
 * @property primary_subcategory
 * @property num_quizzes
 * @property num_practice_tests
 * @property has_closed_caption
 * @property caption_languages
 * @property caption_locales
 * @property estimated_content_length_video
 */
class Course extends Model
{
    protected $fillable = Api::properties;
}
