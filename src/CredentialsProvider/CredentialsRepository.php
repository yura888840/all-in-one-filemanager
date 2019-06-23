<?php

namespace App\CredentialsProvider;

class CredentialsRepository
{
    public const AWS_S3 = 1;
    public const DROPBOX = 2;
    public const GOOGLE_DRIVE = 3;

    private static $mockMode = true;

    const CREDENTIALS_MOCK = [
        self::DROPBOX => [
            123 => [
                [
                    'authorizationToken' => 'uKdYzInAXpAAAAAAAAAAxM0bRAy7ryVB7EcJxYvP4y0gfxeB97XkNzoLF54iG37z',
                ],
                [
                    'authorizationToken' => 'uKdYzInAXpAAAAAAAAAAxM0bRAy7ryVB7EcJxYvP4y0gfxeB97XkNzoLF54iG37z',
                ]
            ],
        ]
    ];

    public static function getByHash()
    {

    }

    public static function getByIds(int $credentialsProviderID, int $userId, int $key)
    {
        if (self::isMockMode()) {
            return self::CREDENTIALS_MOCK[$credentialsProviderID][$userId][$key];
        }
    }

    public static function isMockMode()
    {
        return self::$mockMode;
    }
}
