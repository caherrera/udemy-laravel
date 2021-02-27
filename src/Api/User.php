<?php

namespace Udemy\Laravel\Api;

use Illuminate\Support\Str;

class User extends Api
{
    const properties = [
        '_class',
        'id',
        'email',
        'role',
        'groups'
    ];

    public function get($id = null)
    {
        return $this->processRequest('get', $this->prepareGetUrl($id), []);
    }

    public function prepareGetUrl($id = null)
    {
        $ref      = Str::lower($this->className());
        $name     = 'list';
        $config   = $this->getConfig();
        $endpoint = $config['endpoints'][$ref][$name]['endpoint'];
        $url      = $this->getPath($endpoint, $id);

        return $url;
    }
}
