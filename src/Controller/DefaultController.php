<?php

namespace kollex\Controller;


use kollex\Service\CsvService;
use kollex\Service\JsonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package kollex\Controller
 */
class DefaultController
{
    /**
     * @return Response
     */
    public function index()
    {
        return new Response('test', Response::HTTP_OK);
    }

    /**
     * @param JsonService $jsonService
     * @return Response
     */
    public function jsonFormat(JsonService $jsonService)
    {
        return new Response($jsonService->getJsonResponse($jsonService->getProducts()), Response::HTTP_OK);
    }

    /**
     * @param CsvService $csvService
     * @return Response
     */
    public function csvFormat(CsvService $csvService)
    {
        return new Response($csvService->getJsonResponse($csvService->getProducts()), Response::HTTP_OK);
    }
}