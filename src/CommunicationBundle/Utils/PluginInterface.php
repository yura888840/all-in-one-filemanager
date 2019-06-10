<?php

namespace App\CommunicationBundle\Utils;

interface PluginInterface
{
    public function getMockClass();

    public function getKeyValueClass(): ?string;
}
