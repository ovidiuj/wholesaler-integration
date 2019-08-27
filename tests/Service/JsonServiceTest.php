<?php
namespace kollex\Tests\Service;

use kollex\Service\JsonService;
use \PHPUnit\Framework\TestCase;

class JsonServiceTest extends TestCase
{
    public function testGetJsonResponse()
    {

        $jsonService = $this->getMockBuilder(JsonService::class)
            ->disableOriginalConstructor()
            ->setMethods(['getProducts'])
            ->getMock();

        $jsonService->expects($this->any())
            ->method('getProducts')
            ->willReturn([]);

        $this->assertNotNull($jsonService->getProducts());
        $this->assertEquals(count($jsonService->getProducts()), 0);
    }
}