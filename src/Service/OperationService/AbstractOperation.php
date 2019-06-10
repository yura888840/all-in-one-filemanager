<?php

namespace App\Service\OperationService;

use App\Registry\CloudConnectorRegistry;

class AbstractOperation implements CloudConnectorsAwareInterface
{
    private $connectorRegistry;

    public function setConnectors(CloudConnectorRegistry $connectorRegistry) : self
    {
        $this->connectorRegistry = $connectorRegistry;

        return $this;
    }

    public function getConnectors(): ?CloudConnectorRegistry
    {
        return $this->connectorRegistry;
    }
}
