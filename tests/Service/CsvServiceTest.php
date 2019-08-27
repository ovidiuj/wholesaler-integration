<?php
namespace kollex\Tests\Service;

use kollex\Service\CsvService;
use \PHPUnit\Framework\TestCase;

class CsvServiceTest extends TestCase
{
    public function testGetJsonResponse()
    {

        $jsonService = $this->getMockBuilder(CsvService::class)
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