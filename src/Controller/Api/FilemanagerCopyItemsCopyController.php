<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\CommunicationBundle\Utils\ClientWrapper;
use App\CommunicationBundle\Utils\Plugin\CopyItemsCopyPlugin;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Swagger\Annotations as SWG;

class FilemanagerCopyItemsCopyController extends FOSRestController
{
    /**
     * @Rest\Get("/api/v1/filemanager/items/copy.{_format}", defaults={"_format"="json"})
     * ReactPath("url_list")
     *
     * @SWG\Tag(name="FileManager")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success",
     * )
     *
     *  @SWG\Response(
     *     response="400",
     *     description="Bad Request",
     * )
     *
     * @SWG\Response(
     *     response="500",
     *     description="Internal Error",
     * )
     *
     * @View(statusCode=200)
     *
     * @param ClientWrapper $client
     * @return View
     */
    public function __invoke(ClientWrapper $client)
    {
        $client->setPlugin(new CopyItemsCopyPlugin());

        return $client->call();
    }
}
