<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage",
     *     methods={"GET"}
     *     )
     */
    public function showCartDesktopAction(Request $request)
    {
        return $this->render('base.html.twig', []);
    }
}
