<?php

namespace kollex\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DefaultControllerFunctionalTest extends WebTestCase
{

    public function testJsonStructure()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/json');
        $this->assertEquals('kollex\Controller\DefaultController::jsonFormat', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(Response::HTTP_OK === $client->getResponse()->getStatusCode());
    }

    public function testCsvStructure()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/csv');
        $this->assertEquals('kollex\Controller\DefaultController::csvFormat', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(Response::HTTP_OK === $client->getResponse()->getStatusCode());
    }
}