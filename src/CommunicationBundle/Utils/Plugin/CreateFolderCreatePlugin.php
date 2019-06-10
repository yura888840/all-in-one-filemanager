<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\CreateFolderCreate;
use App\CommunicationBundle\KeyValueObjectMock\CreateFolderCreateMock;

class CreateFolderCreatePlugin extends PluginContainer
{
    protected $mockClass = CreateFolderCreateMock::class;
    protected $objectClass = CreateFolderCreate::class;
}
