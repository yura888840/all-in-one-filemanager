<?php

namespace App\CommunicationBundle\Utils;

interface RestClientInterface
{
    public function setBaseUrl(string $baseUrl): RestClientInterface;

    public function setMockMode(bool $mockMode): RestClientInterface;

    public function setAuth(string $username, string $password): RestClientInterface;

    public function setPlugin(PluginInterface $plugin): RestClientInterface;

    public function call(): RestClientResponseInterface;

    public function callAsync(): RestClientResponseInterface;
}
