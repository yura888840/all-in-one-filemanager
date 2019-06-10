<?php

namespace App\CredentialsProvider;

class S3CredentialsProvider implements CredentialsProviderInterface
{
    /**
     * Get credentials
     *
     * @return \stdClass
     */
    public function getCredentialsFor(int $credentialsProviderID, int $userId, int $key): \stdClass
    {
        return new \stdClass();
    }
}
