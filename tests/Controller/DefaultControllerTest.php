<?php
namespace kollex\Tests\Controller;

use JMS\Serializer\SerializerInterface;
use kollex\Controller\DefaultController;
use kollex\Service\CsvService;
use kollex\Service\JsonService;
use PHPUnit\Framework\TestCase;


class DefaultControllerTest extends TestCase
{
    public function testJsonFormat()
    {
        $jsonService = $this->getMockBuilder(JsonService::class)
            ->disableOriginalConstructor()
            ->setMethods(['getProducts', 'getJsonContent', 'getJsonResponse'])
            ->getMock();

        $serializer = $this->getMockBuilder(SerializerInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['serialize', 'deserialize'])
            ->getMock();

        $serializer->expects($this->any())
            ->method('serialize')
            ->with([], 'json')
            ->willReturn('{}');

        $jsonService->expects($this->once())
            ->method('getJsonResponse')
            ->with([])
            ->willReturn('{}');

        $controller = new DefaultController();
        $controller->jsonFormat($jsonService);

    }

    public function testCsvFormat()
    {
        $csvService = $this->getMockBuilder(CsvService::class)
            ->disableOriginalConstructor()
            ->setMethods(['getProducts', 'getJsonContent', 'getJsonResponse'])
            ->getMock();

        $serializer = $this->getMockBuilder(SerializerInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['serialize', 'deserialize'])
            ->getMock();

        $serializer->expects($this->any())
            ->method('serialize')
            ->with([], 'json')
            ->willReturn('{}');

        $csvService->expects($this->once())
            ->method('getJsonResponse')
            ->with([])
            ->willReturn('{}');

        $controller = new DefaultController();
        $controller->csvFormat($csvService);

    }
}