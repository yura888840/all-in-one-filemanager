<?php

namespace App\Service\ConnectorResolver;

use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Interface ConnectorResolverInterface
 *
 * Takes request, and decides - which adapter(-s) should be returned
 */
interface ConnectorResolverInterface
{
    public function resolve(RequestStack $requestStack) : \ArrayAccess;
}
