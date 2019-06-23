<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\CommunicationBundle\Utils\ClientWrapper;
use App\CommunicationBundle\Utils\Plugin\ListListPlugin;
use App\Service\ConnectorResolver\ReactFilemanagerConnectorResolver;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\QueryParam;

class FilemanagerListListController extends FOSRestController
{
    /**
     * @Rest\Get("/api/v1/filemanager/list.{_format}", defaults={"_format"="json"})
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
     * @QueryParam(name="path", requirements="[a-z]+", description="path")
     *
     * @param ClientWrapper $client
     * @param ParamFetcher  $paramFetcher
     *
     * @return View
     */
    public function __invoke(
        ClientWrapper $client,
        ParamFetcher $paramFetcher
    ) {
        $client->setPlugin(new ListListPlugin());

        return $client->call();
    }
}
