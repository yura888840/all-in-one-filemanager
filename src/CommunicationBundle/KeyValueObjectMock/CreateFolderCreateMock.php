<?php

namespace App\CommunicationBundle\KeyValueObjectMock;

use App\CommunicationBundle\Utils\MockInterface;

class CreateFolderCreateMock implements MockInterface
{
    public static function getMock()
    {
        return [
            'success' => true,
            'errorMsg' => null,
            'error' => null,
            'data' => []
        ];
    }
}
