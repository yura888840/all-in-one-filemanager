<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\Utils\PluginInterface;
use App\CommunicationBundle\Utils\MockInterface;
use App\Service\ConnectorResolver\ConnectorResolverInterface;

abstract class PluginContainer implements PluginInterface
{
    /**
     * @var MockInterface
     */
    protected $mockClass;

    protected $keyValueClass;

    protected $mock;

    protected $connectorResolver;

    public function getKeyValueClass(): ?string
    {
        //@todo remove this workaround
        if ($this->objectClass) {
            $this->keyValueClass = $this->objectClass;
        }

        return $this->keyValueClass;
    }

    public function getMockClass(): MockInterface
    {
        if (!$this->mock) {
            $this->mock = new $this->mockClass();
        }

        return $this->mock;
    }

    public function setMockClass($mockClass): self
    {
        $this->mockClass = $mockClass;
        return $this;
    }

    public function setConnectorResolver(ConnectorResolverInterface $connectorResolver)
    {
        $this->connectorResolver = $connectorResolver;
        return $this;
    }
}
