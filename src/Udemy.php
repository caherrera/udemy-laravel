<?php

namespace Udemy\Laravel;

use Udemy\Laravel\Api\Domain;
use Udemy\Laravel\Api\Link;

class Udemy implements ConnectionInterface
{
    const HEADER_APIKEY = 'authorization';
    protected $links;
    protected $domains;
    /**
     * @var array
     */
    private $config;
    /**
     * @var string
     */
    private $privKey;

    /**
     * @var string
     */
    private $pubKey;
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
            $this->setPrivKey($config['secret']);
        }
        if ($config['public']) {
            $this->setPubKey($config['public']);
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
        return $this->getPrivKey() ?? $this->getPubKey();
    }

    /**
     * @return string
     */
    public function getPrivKey()
    {
        return $this->privKey;
    }

    /**
     * @param  string  $privKey
     *
     * @return Udemy
     */
    public function setPrivKey($privKey)
    {
        $this->privKey = $privKey;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPubKey(): string
    {
        return $this->pubKey;
    }

    /**
     * @param  mixed  $pubKey
     *
     * @return Udemy
     */
    public function setPubKey($pubKey)
    {
        $this->pubKey = $pubKey;

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
     * @return Link
     */
    public function links()
    {
        if ($this->links === null) {
            $this->links = new Link($this);
        }

        return $this->links;
    }

    /**
     * @return Domain
     */
    public function domains()
    {
        if ($this->domains === null) {
            $this->domains = new Domain($this);
        }

        return $this->domains;
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
