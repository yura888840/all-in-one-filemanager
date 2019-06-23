<?php

namespace App\CloudConnection;

use Aws\S3\S3Client;
use League\Flysystem\Adapter\NullAdapter;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use App\CredentialsProvider\CredentialsRepository;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
//@todo refactor this module. Structure it in proper way (think about it)

class FilesystemFactory
{
    public static function getFilesystem($type, $credentials) : Filesystem
    {
        switch ($type) {
            case CredentialsRepository::DROPBOX:
                $client = new DropboxClient($credentials['authorizationToken']);
                $adapter = new DropboxAdapter($client);

                break;

            case CredentialsRepository::AWS_S3:
                $client = new S3Client($credentials['client_credentials']);
                $adapter = new AwsS3Adapter($client, $credentials['bucket']);
                break;

            default:
                $adapter = new NullAdapter();
                break;
        }

        return new Filesystem($adapter, ['case_sensitive' => false]);
    }
}
