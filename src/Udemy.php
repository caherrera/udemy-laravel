<?php

namespace Udemy\Laravel;

use Udemy\Laravel\Api\Course;
use Udemy\Laravel\Api\User;
use Udemy\Laravel\Api\UserCourse;

class Udemy implements ConnectionInterface
{
    const HEADER_APIKEY = 'authorization';
    protected $course;
    protected $users;
    protected $user_course_activies;
    /**firstOrCreate
     *
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
        return 'Basic '.base64_encode($this->getClient().':'.$this->getSecret());
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
     * @return User
     */
    public function users()
    {
        if ($this->users === null) {
            $this->users = new User($this);
        }

        return $this->users;
    }

    /**
     * @return UserCourse
     */
    public function user_course_activities()
    {
        if ($this->user_course_activities === null) {
            $this->user_course_activities = new UserCourse($this);
        }

        return $this->user_course_activities;
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
