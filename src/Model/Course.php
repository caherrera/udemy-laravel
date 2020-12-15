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

    static public function all()
    {
        (new static)->newInstance();

        return Cache::remember(
            static::class.'@all',
            config("UDEMY_ORGANIZATION_DOMAIN"),
            function () {
                $course = Course::all();

                return $course->all();
            }
        );
    }

    /**
     * Perform a model insert operation.
     *
     * @return bool
     */
    protected function performInsert(ApiInterface $api)
    {
        if ($this->fireModelEvent('creating') === false) {
            return false;
        }

        $attributes = collect($this->getAttributes())->filter(
            function ($v) {
                return ! empty($v);
            }
        )->all();
        if (isset($attributes['id'])) {
            $attributes['course'] = Course::find($attributes['id'])->hostname;
            unset($attributes['id']);
        }

        if (empty($attributes)) {
            return true;
        }

        $data = $api->save($attributes);
        $this->fill($data);
        $this->id = $data['id'];

        // We will go ahead and set the exists property to true, so that it is set when
        // the created event is fired, just in case the developer tries to update it
        // during the event. This will allow them to do so and run an update here.
        $this->exists = true;

        $this->wasRecentlyCreated = true;

        $this->fireModelEvent('created', false);

        return true;
    }
}
