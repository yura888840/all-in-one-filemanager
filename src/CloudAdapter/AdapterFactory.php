<?php

namespace App\CloudAdapter;

use App\CloudConnection\CloudConnectionInterface;

class AdapterFactory
{
    public static function create(CloudConnectionInterface $connection) : AbstractAdaper
    {
        
    }
}
