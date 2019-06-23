<?php

namespace App\CommunicationBundle\Utils;

use App\CommunicationBundle\KeyValueObjectMock\MockFactory;
use App\Service\ConnectorResolver\ConnectorResolverInterface;
use App\Service\ConnectorResolver\ReactFilemanagerConnectorResolver;

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

    /**
     * @var ConnectorResolverInterface
     */
    private $connectorResolver;

    /**
     * ClientWrapper constructor.
     *
     * @param RestClientInterface        $client
     * @param ConnectorResolverInterface $connectorResolver
     */
    public function __construct(RestClientInterface $client, ConnectorResolverInterface $connectorResolver)
    {
        $this->client = $client;
        $this->connectorResolver = $connectorResolver;
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
        $this->plugin->setConnectorResolver($this->connectorResolver);

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

        $class = $this->plugin->getKeyValueClass();
        $obj = new $class($this->connectorResolver);

        return $obj();
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
