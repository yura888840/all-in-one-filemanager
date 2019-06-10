<?php

namespace App\CommunicationBundle\Utils;

use App\CommunicationBundle\KeyValueObjectMock\MockFactory;

class ClientWrapper implements ClientWrapperInterface
{
    const MESSAGE_MANDATORY_PLUGIN = 'plugin needs to be provided!';

    protected $mockMode = false;

    /**
     * @var PluginInterface
     */
    private $plugin;

    /**
     * @var RestClientInterface
     */
    private $client;

    public function __construct(RestClientInterface $client)
    {
        $this->client = $client;
    }

    public function setMockMode(bool $mockMode): ClientWrapperInterface
    {
        $this->mockMode = $mockMode;

        return $this;
    }

    private function isMockMode(): bool
    {
        return $this->mockMode;
    }

    public function setPlugin(PluginInterface $plugin): ClientWrapperInterface
    {
        $this->plugin = $plugin;

        return $this;
    }

    public function call()//: ClientWrapperResponseInterface
    {
        if (null === $this->plugin) {
            throw new \RuntimeException(self::MESSAGE_MANDATORY_PLUGIN);
        }

        if ($this->isMockMode()) {
            return $this->mockCall();
        }

        //return $this->plugin->getKeyValueClass();
    }

    public function callAsync(): ClientWrapperResponseInterface
    {
        // TODO: Implement callAsync() method.
    }

    private function mockCall()//: ClientWrapperResponseInterface
    {
        if (!$this->plugin->getMockClass()) {
            throw new \RuntimeException('If mock-mode is activated, a mock class is required');
        }

        return $this->getMock();
    }

    /**
     * Mock class can follow the mock interface or it can be a dto
     * @return mixed
     */
    private function getMock()
    {
        $mockClass = $this->plugin->getMockClass();

        if ($mockClass instanceof MockInterface) {
            return MockFactory::getMockFor($mockClass);
        }

        return $mockClass;
    }
}
