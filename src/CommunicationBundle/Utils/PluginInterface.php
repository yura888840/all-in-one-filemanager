<?php

namespace App\CommunicationBundle\Utils;

use App\Service\ConnectorResolver\ConnectorResolverInterface;

interface PluginInterface
{
    public function getMockClass();

    public function getKeyValueClass(): ?string;

    public function setConnectorResolver(ConnectorResolverInterface $connectorResolver);
}
