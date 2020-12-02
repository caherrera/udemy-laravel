<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Api
    |--------------------------------------------------------------------------
    |
    | This is host api for udemy
    |
    */

    'organization' =>[
        'domain' => env('UDEMY_ORGANIZATION_DOMAIN', ''),
        'id' => env('UDEMY_ORGANIZATION_ID', '')
    ],

    /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | This is base path for endpoint
    |
    */

    'endpoints' => [
        'user-activity' => [
            'get' => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_USER_ACTIVITY', 'analytics/user-activity/?user_email=')],
            'list' => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_USERS_ACTIVITY', 'analytics/user-activity/')],

        ],
        'user-course-activity' => [
            'get' => [
                'id' => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_USER_COURSES_ACTIVITY', 'analytics/user-course-activity/?course_id=')],
                'user' => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_USER_COURSES_ACTIVITY', 'analytics/user-course-activity/?user_email=')],
            ],
            'list'   => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_USER_COURSE_ACTIVITY', 'analytics/user-course-activity/')],
        ],
        'course' => [
            'get' => [
                'id' => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_COURSE_LIST', 'courses/list/?course_id=')],
                'page-size' => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_COURSE_LIST', 'courses/list/?page_size=')],
            ],
            'list' => ['method' => 'GET', 'endpoint' => env('UDEMY_PATH_COURSE_LIST', 'courses/list')],
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Secret Key
    |--------------------------------------------------------------------------
    |
    | This key is private and gives access to all your links. Please do not
    | share this key with people you do not trust. Do not include it in HTML
    | and JavaScript webpages and iPhone/Android apps.
    |
    */
    'secret'  => env('UDEMY_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | Public Key
    |--------------------------------------------------------------------------
    |
    | This key allows only to create a link on your domains. It is safe to
    | include it in your frontend javascript code, iPhone, Android or desktop
    | apps. Please note, if you will include this key in your public source
    | code, everyone can create links on your domains. Please use it only if
    | you expect this behavior.
    |
    */
    'client'  => env('UDEMY_CLIENT', null),

    /*
    |--------------------------------------------------------------------------
    | Headers
    |--------------------------------------------------------------------------
    |
    | Any Extra Headers
    |
    */
    'headers' => env('UDEMY_HEADERS', []),

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Setting Cache
    |
    */
    'cache'   => [
        'timeout' => env('UDEMY_CACHE_TIMEOUT', 3600),
    ]

];
