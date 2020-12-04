<?php

namespace Udemy\Laravel\Model;

use Udemy\Laravel\Api\Course as Api;

/**
 * Class Course
 *
 * @package Udemy\Laravel\Model
 *
 * @property-read _class
 * @property-read id
 * @property-read title
 * @property-read description
 * @property-read url
 * @property-read estimated_content_length
 * @property-read categories
 * @property-read num_lectures
 * @property-read num_videos
 * @property-read promo_video_url
 * @property-read instructors
 * @property-read requirements
 * @property-read what_you_will_learn
 * @property-read images
 * @property-read mobile_native_deeplink
 * @property-read locale
 * @property-read is_practice_test_course
 * @property-read primary_category
 * @property-read primary_subcategory
 * @property-read num_quizzes
 * @property-read num_practice_tests
 * @property-read has_closed_caption
 * @property-read caption_languages
 * @property-read caption_locales
 * @property-read estimated_content_length_video
 */

class Course extends Model
{
    protected $fillable = Api::properties;
}
