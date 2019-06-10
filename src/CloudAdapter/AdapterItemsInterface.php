<?php

namespace App\CloudAdapter;

interface AdapterItemsInterface
{
    public function doUpload();

    public function doRemove();

    public function doMove();

    public function doCopy();

    public function doCompress();
}
