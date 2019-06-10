<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\ExtractFileExtract;
use App\CommunicationBundle\KeyValueObjectMock\ExtractFileExtractMock;

class ExtractFileExtractPlugin extends PluginContainer
{
    protected $mockClass = ExtractFileExtractMock::class;
    protected $objectClass = ExtractFileExtract::class;
}
