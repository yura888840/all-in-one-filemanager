<?php

namespace App\CloudAdapter;

interface AdapterFileInterface
{
    public function doDownload();

    public function doUpload();

    public function doDelete();

    public function doRename();

    public function doMove();

    public function doExecuteCommand();

}
