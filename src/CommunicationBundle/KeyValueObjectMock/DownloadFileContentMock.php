<?php

namespace App\CommunicationBundle\KeyValueObjectMock;

use App\CommunicationBundle\Utils\MockInterface;

class DownloadFileContentMock implements MockInterface
{
    public static function getMock()
    {
        return [
            [__CLASS__]
        ];
    }
}
