<?php

namespace Udemy\Laravel\Model;

use Illuminate\Support\Facades\Cache;
use Udemy\Laravel\Api\User as Api;

/**
 * Class UserActivity
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
class User extends Model
{
    protected $fillable = Api::properties;

    public function get($path = null)
    {
        $cache_key = static::class.'@get';
        if ($path) {
            $cache_key .= '/'.$path;
        }
        $i = (new static)->newInstance();

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
