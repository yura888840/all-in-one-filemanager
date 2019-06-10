<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\CommunicationBundle\Utils\ClientWrapper;
use App\CommunicationBundle\Utils\Plugin\CreateFolderCreatePlugin;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;

class FilemanagerCreateFolderDirCreateController extends FOSRestController
{
    /**
     * @Rest\Post("/api/v1/filemanager/dir/create.{_format}", defaults={"_format"="json"})
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
        $client->setPlugin(new CreateFolderCreatePlugin());

        return $client->call();
    }

    /**
     * @Rest\Options("/api/v1/filemanager/dir/create.{_format}", defaults={"_format"="json"})
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
     * @return View|JsonResponse
     */
    public function options(ClientWrapper $client)
    {
        return new JsonResponse([]);
    }
}
