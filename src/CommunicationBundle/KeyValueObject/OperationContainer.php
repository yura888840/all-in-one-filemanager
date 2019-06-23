<?php

namespace App\CommunicationBundle\KeyValueObject;

use App\Service\ConnectorResolver\ConnectorResolverInterface;

class OperationContainer
{
    /**
     * @var ConnectorResolverInterface
     */
    protected $connectorResolver;

    public function __construct(ConnectorResolverInterface $connectorResolver)
    {
        $this->connectorResolver = $connectorResolver;
    }
}
