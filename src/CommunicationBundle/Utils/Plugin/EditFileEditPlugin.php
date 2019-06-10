<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\EditFileEdit;
use App\CommunicationBundle\KeyValueObjectMock\EditFileEditMock;

class EditFileEditPlugin extends PluginContainer
{
    protected $mockClass = EditFileEditMock::class;
    protected $objectClass = EditFileEdit::class;
}
