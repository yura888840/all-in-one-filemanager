<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\CopyItemsCopy;
use App\CommunicationBundle\KeyValueObjectMock\CopyItemsCopyMock;

class CopyItemsCopyPlugin extends PluginContainer
{
    protected $mockClass = CopyItemsCopyMock::class;
    protected $objectClass = CopyItemsCopy::class;
}
