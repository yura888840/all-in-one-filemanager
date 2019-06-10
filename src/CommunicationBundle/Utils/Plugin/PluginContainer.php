<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\Utils\PluginInterface;
use App\CommunicationBundle\Utils\MockInterface;

abstract class PluginContainer implements PluginInterface
{
    /**
     * @var MockInterface
     */
    protected $mockClass;

    protected $keyValueClass;

    protected $mock;

    public function getKeyValueClass(): ?string
    {
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
}
