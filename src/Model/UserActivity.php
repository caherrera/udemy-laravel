<?php

namespace Udemy\Laravel\Model;

use Illuminate\Support\Facades\Cache;
use Udemy\Laravel\Api\UserActivity as Api;

/**
 * Class UserActivity.
 *
 * @property user_name
 * @property user_surname
 * @property user_email
 * @property user_role
 * @property user_external_id
 * @property user_is_deactivated
 * @property num_new_enrolled_courses
 * @property num_new_assigned_courses
 * @property num_new_started_courses
 * @property num_completed_courses
 * @property num_completed_lectures
 * @property num_completed_quizzes
 * @property num_video_consumed_minutes
 * @property num_web_visited_days
 * @property last_date_visit
 */
class UserActivity extends Model
{
    protected $fillable = Api::properties;

    public function get($path = null)
    {
        $cache_key = static::class.'@get';
        if ($path) {
            $cache_key .= '/'.$path;
        }
        $i = (new static())->newInstance();

        return Cache::remember(
            $cache_key,
            config('udemy.cache.timeout'),
            function () use ($i, $path) {
                $raw = $i->getApi()->get($path);

                return $i->hydrate(
                    $raw['results']
                );
            }
        );
    }
}
