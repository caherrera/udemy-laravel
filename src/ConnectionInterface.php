<?php

namespace Udemy\Laravel;

interface ConnectionInterface
{

    public function setConfig(array $config = []);

    public function config($key = null);

    public function getConfig($config = null);

    public function getPubKey(): string;

    public function setPubKey(string $pub);

    public function initialize(array $config = []);

    public function getHeaders(): array;
}
