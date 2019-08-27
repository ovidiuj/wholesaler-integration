<?php

namespace kollex\Tests\Service;


use kollex\Service\AbstractService;
use kollex\Service\ValidationService;
use PHPUnit\Framework\TestCase;

class AbstractServiceTest extends TestCase
{
    public function testGetJsonResponse()
    {
        $validatorService = $this->getMockBuilder(ValidationService::class)
            ->disableOriginalConstructor()
            ->setMethods(['validate'])
            ->getMock();

        $stub = $this->getMockForAbstractClass(AbstractService::class, [$validatorService], '', true, true, true, ['getJsonResponse']);
        $stub->expects($this->once())
            ->method('getJsonResponse')
            ->with([])
            ->will($this->returnValue('{}'));

        $this->assertNotNull($stub->getJsonResponse([]));
    }
}