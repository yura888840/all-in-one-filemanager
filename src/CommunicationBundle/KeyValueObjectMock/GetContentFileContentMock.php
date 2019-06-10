<?php

namespace App\CommunicationBundle\KeyValueObjectMock;

use App\CommunicationBundle\Utils\MockInterface;

class GetContentFileContentMock implements MockInterface
{
    public static function getMock()
    {
        return [
            'success' => true,
            'data' => 'http://localhost:3000/surganowa.txt_Ascii.txt'
        ];
    }
}
