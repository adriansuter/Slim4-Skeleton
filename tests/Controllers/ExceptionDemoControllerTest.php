<?php

declare(strict_types=1);

namespace App\Tests;

use App\Controllers\ExceptionDemoController;
use ErrorException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExceptionDemoControllerTest extends TestCase
{
    /**
     * @expectedException ErrorException
     */
    public function testInvoke()
    {
        $exceptionDemoController = new ExceptionDemoController();

        $serverRequest = $this->createMock(ServerRequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);

        $exceptionDemoController($serverRequest, $response, []);
    }
}
