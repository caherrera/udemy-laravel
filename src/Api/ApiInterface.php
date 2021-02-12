<?php

namespace Udemy\Laravel\Api;

use Udemy\Laravel\ConnectionInterface;

interface ApiInterface
{
    public function prepareBaseUrl($url = null);

    public function getHost();

    public function getProtocol();

    public function getPath();

    public function getFullPath();

    public function className();

    public function prepareHeaders();

    public function getConnector();

    public function setConnector(ConnectionInterface $connector);

    public function client();

    public function getConfig();

    public function setConfig($config);

    public function get($id = null);

    public function getBaseUrl(): string;

    public function setBaseUrl($url);

    public function all($page = null);

    public function save(array $data = []);

    public function isNew();

    public function create(array $data = []);

    public function post($url, array $data = []);

    public function update($id, array $data = []);

    public function getId();

    public function setId($id);

    public function prepareGenericUrl($name, $id = null);

    public function delete($id);

    public function getQueryString();

    /**
     * @return bool
     */
    public function hasQueryString();

    public function withQueryString(array $data = []);

    /**
     * @param array|string $key
     * @param null         $value
     *
     * @return mixed
     */
    public function addQueryString($key, $value = null);

    /**
     * @return \Illuminate\Http\Client\PendingRequest
     */
    public function prepareRequest();
}
