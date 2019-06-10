<?php

namespace App\CloudConnection;

interface CloudConnectionInterface
{
    public function connect();

    public function setCredentials();
}
