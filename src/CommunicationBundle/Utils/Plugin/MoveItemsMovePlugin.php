<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\MoveItemsMove;
use App\CommunicationBundle\KeyValueObjectMock\MoveItemsMoveMock;

class MoveItemsMovePlugin extends PluginContainer
{
    protected $mockClass = MoveItemsMoveMock::class;
    protected $objectClass = MoveItemsMove::class;
}
