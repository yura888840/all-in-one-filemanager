<?php

namespace App\Service\OperationService;

use App\Registry\CloudConnectorRegistry;

class ListOperation
{
    private $cloudConnectorRegistry;

    public function __construct()
    {

    }

    public function setCloudConnectorRegistry(CloudConnectorRegistry $cloudConnectorRegistry)
    {
        $this->cloudConnectorRegistry = $cloudConnectorRegistry;
    }
}
