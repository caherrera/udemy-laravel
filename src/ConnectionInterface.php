<?php

namespace Udemy\Laravel;

interface ConnectionInterface
{

    public function setConfig(array $config = []);

    public function config($key = null);

    public function getConfig($config = null);

    public function getSecret(): string;

    public function setSecret(string $pub);

    public function initialize(array $config = []);

    public function getHeaders(): array;
}
