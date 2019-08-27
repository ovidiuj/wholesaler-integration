<?php
namespace kollex\Tests\Controller;

use kollex\Controller\DefaultController;
use kollex\Service\JsonService;
use PHPUnit\Framework\TestCase;


class DefaultControllerTest extends TestCase
{
    public function testJsonFormat()
    {
        $jsonService = $this->getMockBuilder(JsonService::class)
            ->setMethods(['getProducts', 'getJsonContent'])
            ->getMock();

        $controller = new DefaultController();
        $controller->jsonFormat($jsonService);

    }
}