<?php
declare(strict_types=1);

namespace App\Controller\Api;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Swagger\Annotations as SWG;

class FilemanagerController extends FOSRestController
{
    /**
     * @Rest\Get("/api/filemanager/v1/list.{_format}", defaults={"_format"="json"})
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
     */
    public function listAction()
    {

    }
}
