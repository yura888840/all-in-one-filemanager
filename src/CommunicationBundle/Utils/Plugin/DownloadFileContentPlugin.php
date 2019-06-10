<?php

namespace App\CommunicationBundle\Utils\Plugin;

use App\CommunicationBundle\KeyValueObject\DownloadFileContent;
use App\CommunicationBundle\KeyValueObjectMock\DownloadFileContentMock;

class DownloadFileContentPlugin extends PluginContainer
{
    protected $mockClass = DownloadFileContentMock::class;
    protected $objectClass = DownloadFileContent::class;
}
