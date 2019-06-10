<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\CompressItemsCompress;
use App\CommunicationBundle\KeyValueObjectMock\CompressItemsCompressMock;

class CompressItemsCompressPlugin extends PluginContainer
{
    protected $mockClass = CompressItemsCompressMock::class;
    protected $objectClass = CompressItemsCompress::class;
}
