<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\ListList;
use App\CommunicationBundle\KeyValueObjectMock\ListListMock;

class ListListPlugin extends PluginContainer
{
    protected $mockClass = ListListMock::class;
    protected $objectClass = ListList::class;
}
