<?php

namespace App\CloudAdapter;

interface AdapterFileInterface
{
    public function doGetContent();

    public function doDownload();

    public function doEdit();
}
