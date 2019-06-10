<?php

namespace App\CommunicationBundle\KeyValueObjectMock;

use App\CommunicationBundle\Utils\MockInterface;

class MockFactory
{
    public static function getMockFor(MockInterface $mockName)
    {
        return $mockName::getMock();
    }
}
