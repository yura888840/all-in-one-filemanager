<?php

namespace App\CloudAdapter;

interface AdapterDirInterface
{
    public function doList();

    public function doCreate();
}
