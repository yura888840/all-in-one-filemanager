<?php

namespace App\Service\ConnectorResolver;

use App\Registry\CloudConnectorRegistry;
use Symfony\Component\HttpFoundation\RequestStack;

class ReactFilemanagerConnectorResolver implements ConnectorResolverInterface
{
    public function resolve(RequestStack $requestStack): \ArrayAccess
    {
        return new CloudConnectorRegistry();
    }
}
