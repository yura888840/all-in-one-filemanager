<?php

namespace App\CommunicationBundle\Utils;

use Psr\Http\Message\ResponseInterface;

interface RestClientResponseInterface
{
    public function getDto();

    public function getHttpResponse(): ?ResponseInterface;

    public function setHttpResponse(ResponseInterface $httpResponse): RestClientResponseInterface;
}
