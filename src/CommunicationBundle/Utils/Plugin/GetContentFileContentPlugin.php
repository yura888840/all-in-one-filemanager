<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\GetContentFileContent;
use App\CommunicationBundle\KeyValueObjectMock\GetContentFileContentMock;

class GetContentFileContentPlugin extends PluginContainer
{
    protected $mockClass = GetContentFileContentMock::class;
    protected $objectClass = GetContentFileContent::class;
}
