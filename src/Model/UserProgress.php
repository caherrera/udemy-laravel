<?php

namespace Udemy\Laravel\Model;

use Illuminate\Support\Facades\Cache;
use Udemy\Laravel\Api\UserActivity as Api;

/**
 * Class UserActivity.
 *
 * @property user_email
 * @property course_id
 * @property course_title
 * @property item_title
 * @property user_name
 * @property user_surname
 * @property user_role
 * @property user_is_deactivated
 * @property item_type
 * @property item_id
 * @property item_start_time
 * @property item_completion_time
 * @property item_views
 * @property item_completion_ratio
 * @property item_final_result
 * @property item_marked_complete
 * @property course_category
 */
class UserProgress extends Model
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
