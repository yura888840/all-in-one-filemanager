<?php

namespace App\CredentialsProvider\Mock;

use App\CredentialsProvider\CredentialsProviderInterface;

class S3CredentialsMock implements CredentialsProviderInterface
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

    public function getByHash(string $hash): \stdClass
    {
        // TODO: Implement getByHash() method.
    }
}
