<?php

namespace Udemy\Laravel\Model;

use Udemy\Laravel\Api\UserActivity as Api;

/**
 * Class uSERActivity
 *
 * @package Udemy\Laravel\Model
 *
 * @property-read user_name
 * @property-read user_surname
 * @property-read user_email
 * @property-read user_role
 * @property-read user_external_id
 * @property-read user_is_deactivated
 * @property-read num_new_enrolled_courses
 * @property-read num_new_assigned_courses
 * @property-read num_new_started_courses
 * @property-read num_completed_courses
 * @property-read num_completed_lectures
 * @property-read num_completed_quizzes
 * @property-read num_video_consumed_minutes
 * @property-read num_web_visited_days
 * @property-read last_date_visit
 */

class UserActivity extends Model
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
            $attributes['user_activity'] = UserActivity::find($attributes['id'])->hostname;
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
