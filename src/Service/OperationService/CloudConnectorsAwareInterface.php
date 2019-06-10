<?php

namespace App\Service\OperationService;

use App\Registry\CloudConnectorRegistry;

interface CloudConnectorsAwareInterface
{
    public function setConnectors(CloudConnectorRegistry $connectorRegistry);

    public function getConnectors() : ?CloudConnectorRegistry;
}
