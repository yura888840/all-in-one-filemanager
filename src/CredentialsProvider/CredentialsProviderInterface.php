<?php

namespace App\CredentialsProvider;

interface CredentialsProviderInterface
{
    /**
     * Get default credentials
     *
     * @return \stdClass
     */
    public function getCredentialsFor(int $credentialsProviderID, int $userId, int $key) : \stdClass;

    public function getByHash(string $hash) : \stdClass;
}
