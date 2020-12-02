<?php

namespace Udemy\Laravel;

use Udemy\Laravel\Api\Course;
use Udemy\Laravel\Api\UserActivity;
use Udemy\Laravel\Api\UserCourseActivity;

class Udemy implements ConnectionInterface
{
    const HEADER_APIKEY = 'authorization';
    protected $course;
    protected $useractivity;
    protected $usercourseactivy;
    /**
     * @var array
     */
    private $config;
    /**
     * @var string
     */
    private $client;

    /**
     * @var string
     */
    private $secret;
    /**
     * @var array
     */
    private $requestHeaders = [];

    public function __construct($config = [])
    {
        $this->initialize($config);
    }

    public function initialize(array $config = [])
    {
        $this->setConfig($config)
             ->setHeaders($config['headers']);

        if ($config['secret']) {
            $this->setSecret($config['secret']);
        }
        if ($config['client']) {
            $this->setClient($config['client']);
        }

        $this->setAuthorization($this->prepareAuthorization());
    }

    public function setHeaders(array $headers = [])
    {
        $this->requestHeaders = $headers;

        return $this;
    }

    public function setAuthorization($api_key)
    {
        if ($api_key) {
            return $this->addHeader(self::HEADER_APIKEY, $api_key);
        }
    }

    public function addHeader(string $header, string $value)
    {
        if ( ! isset($this->requestHeaders[$header])) {
            $this->requestHeaders[$header] = [];
        }
        $this->requestHeaders[$header][] = $value;
    }

    /**
     * @return string | null
     */
    public function prepareAuthorization()
    {
        return $this->getClient() ?? $this->getSecret();
    }

    /**
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param  string  $client
     *
     * @return Udemy
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @param  mixed  $secret
     *
     * @return Udemy
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    public function config($key = null)
    {
        if ($key) {
            return isset($this->config[$key]) ? $this->config[$key] : null;
        }

        return $this->config;
    }

    /**
     * @return Course
     */
    public function courses()
    {
        if ($this->courses === null) {
            $this->courses = new Course($this);
        }

        return $this->courses;
    }

    /**
     * @return UserActivity
     */
    public function userActivities()
    {
        if ($this->userActivities === null) {
            $this->userActivities = new UserActivity($this);
        }

        return $this->userActivities;
    }

    /**
     * @return UserCourseActivity
     */
    public function userCourseActivities()
    {
        if ($this->userCourseActivities === null) {
            $this->userCourseActivities = new UserCourseActivity($this);
        }

        return $this->userCourseActivities;
    }

    public function getConfig($config = null)
    {
        return $config ? ($this->config[$config] ?? null) : $this->config;
    }

    /**
     * @param  array|int|string  $config
     *
     * @return Udemy
     */
    public function setConfig(array $config = [])
    {
        $this->config = $config;

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->requestHeaders;
    }
}
