<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\UploadItemsUpload;
use App\CommunicationBundle\KeyValueObjectMock\UploadItemsUploadMock;

class UploadItemsUploadPlugin extends PluginContainer
{
    protected $mockClass = UploadItemsUploadMock::class;
    protected $objectClass = UploadItemsUpload::class;
}
