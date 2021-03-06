<?php

namespace Udemy\Laravel\Model;

use Illuminate\Support\Facades\Cache;
use Udemy\Laravel\Api\User as Api;

/**
 * Class UserActivity.
 *
 * @property _class
 * @property id
 * @property email
 * @property role
 * @property group
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
