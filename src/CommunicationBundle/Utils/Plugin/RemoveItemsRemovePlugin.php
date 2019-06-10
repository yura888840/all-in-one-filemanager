<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\RemoveItemsRemove;
use App\CommunicationBundle\KeyValueObjectMock\RemoveItemsRemoveMock;

class RemoveItemsRemovePlugin extends PluginContainer
{
    protected $mockClass = RemoveItemsRemoveMock::class;
    protected $objectClass = RemoveItemsRemove::class;
}
