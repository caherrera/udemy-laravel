<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Api
    |--------------------------------------------------------------------------
    |
    | This is host api for short.io
    |
    */

    'api' => env('Udemy_API', 'api.short.cm'),

    /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | This is base path for endpoint
    |
    */

    'endpoints' => [
        'domain' => [
            'get'    => ['method' => 'POST', 'endpoint' => env('Udemy_PATH_DOMAIN_GET', 'api/domains')],
            'list'   => ['method' => 'POST', 'endpoint' => env('Udemy_PATH_DOMAIN_LIST', 'api/domains')],
            'create' => ['method' => 'POST', 'endpoint' => env('Udemy_PATH_DOMAIN_CREATE', 'domains')],
            'update' => ['method' => 'POST', 'endpoint' => env('Udemy_PATH_DOMAIN_UPDATE', 'domains/settings')],
            'delete' => ['method' => 'POST', 'endpoint' => env('Udemy_PATH_DOMAIN_DELETE', 'domains/delete')],
        ],
        'link'   => [
            'get'    => ['method' => 'GET', 'endpoint' => env('Udemy_PATH_LINKS_GET', 'api/links')],
            'list'   => ['method' => 'GET', 'endpoint' => env('Udemy_PATH_LINKS_LIST', 'api/links')],
            'create' => ['method' => 'POST', 'endpoint' => env('Udemy_PATH_LINKS_CREATE', 'links')],
            'update' => ['method' => 'POST', 'endpoint' => env('Udemy_PATH_LINKS_UPDATE', 'links/{ID}')],
            'delete' => ['method' => 'DELETE', 'endpoint' => env('Udemy_PATH_LINKS_DELETE', 'links')],
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Secure Protocol
    |--------------------------------------------------------------------------
    |
    | indicate if use secure protocol
    |
    */

    'secure'  => env('Udemy_SECURE', true),


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
    'secret'  => env('Udemy_KEY', null),

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
    'public'  => env('Udemy_PUBKEY', null),

    /*
    |--------------------------------------------------------------------------
    | Headers
    |--------------------------------------------------------------------------
    |
    | Any Extra Headers
    |
    */
    'headers' => env('Udemy_HEADERS', []),

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Setting Cache
    |
    */
    'cache'   => [
        'timeout' => env('Udemy_CACHE_TIMEOUT', 3600),
    ]

];
