<?php

namespace App\CommunicationBundle\Utils;

class NullClient implements RestClientInterface
{
    public function setBaseUrl(string $baseUrl): RestClientInterface
    {
        // TODO: Implement setBaseUrl() method.
    }

    public function setMockMode(bool $mockMode): RestClientInterface
    {
        // TODO: Implement setMockMode() method.
    }

    public function setAuth(string $username, string $password): RestClientInterface
    {
        // TODO: Implement setAuth() method.
    }

    public function setPlugin(PluginInterface $plugin): RestClientInterface
    {
        // TODO: Implement setPlugin() method.
    }

    public function call(): RestClientResponseInterface
    {
        // TODO: Implement call() method.
    }

    public function callAsync(): RestClientResponseInterface
    {
        // TODO: Implement callAsync() method.
    }
}
