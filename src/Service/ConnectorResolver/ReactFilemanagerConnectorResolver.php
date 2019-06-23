<?php

namespace App\Service\ConnectorResolver;

use App\CloudConnection\FilesystemFactory;
use App\CredentialsProvider\CredentialsRepository;
use App\Registry\CloudConnectorRegistry;
use League\Flysystem\Filesystem;
use Symfony\Component\HttpFoundation\RequestStack;

class ReactFilemanagerConnectorResolver implements ConnectorResolverInterface
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function resolve(): \ArrayAccess
    {
        return $this->resolveMock();
    }

    public function resolveMock(): \ArrayAccess
    {
        $credentials = CredentialsRepository::getByIds(CredentialsRepository::DROPBOX, 123, 0);
        /** @var Filesystem $filesystem */
        $fs1 = FilesystemFactory::getFilesystem(CredentialsRepository::DROPBOX, $credentials);


        $credentials = CredentialsRepository::getByIds(CredentialsRepository::DROPBOX, 123, 1);
        /** @var Filesystem $filesystem */
        $fs2 = FilesystemFactory::getFilesystem(CredentialsRepository::DROPBOX, $credentials);

        return (new CloudConnectorRegistry())
            ->addConnector($fs1)
            ->addConnector($fs2);
    }
}
