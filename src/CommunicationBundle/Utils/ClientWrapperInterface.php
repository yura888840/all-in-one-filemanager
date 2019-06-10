<?php

namespace App\CommunicationBundle\Utils;

interface ClientWrapperInterface
{
    public function setMockMode(bool $mockMode): ClientWrapperInterface;

    public function setPlugin(PluginInterface $plugin): ClientWrapperInterface;

    public function call();//: ClientWrapperResponseInterface;

    public function callAsync(): ClientWrapperResponseInterface;
}
