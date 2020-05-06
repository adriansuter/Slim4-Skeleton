<?php

declare(strict_types=1);

namespace App\Tests;

use App\Controllers\ExceptionDemoController;
use ErrorException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExceptionDemoControllerTest extends TestCase
{
    public function testInvoke()
    {
        $this->expectException(ErrorException::class);

        $exceptionDemoController = new ExceptionDemoController();

        $serverRequest = $this->createMock(ServerRequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);

        $exceptionDemoController($serverRequest, $response, []);
    }
}
