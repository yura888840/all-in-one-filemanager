<?php

namespace App\CloudAdapter;

interface AdapterDirInterface
{
    public function doList();

    public function doCreate();

    public function doCD();

    public function doDelete();

    public function doRename();

    public function doExecuteCommand();
}
