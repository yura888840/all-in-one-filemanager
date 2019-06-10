<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\RenameItemMove;
use App\CommunicationBundle\KeyValueObjectMock\RenameItemMoveMock;

class RenameItemMovePlugin extends PluginContainer
{
    protected $mockClass = RenameItemMoveMock::class;
    protected $objectClass = RenameItemMove::class;
}
