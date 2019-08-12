<?php

declare(strict_types=1);

namespace App\Tests;

use App\Controllers\HelloController;
use Prophecy\Argument;
use Prophecy\Prophecy\MethodProphecy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class HelloControllerTest extends TestCase
{
    public function testInvoke()
    {
        $self = $this;
        $twigProphecy = $this->prophesize(Twig::class);
        $twigProphecy->addMethodProphecy(
            (new MethodProphecy(
                $twigProphecy,
                'render',
                [Argument::type(ResponseInterface::class), Argument::type('string'), Argument::type('array')]
            ))->will(function ($arguments) use ($self) {
                $self->assertSame('hello.twig', $arguments[1]);
                $self->assertSame([
                    'pageTitle' => 'Hello Slim',
                    'name' => 'Slim'
                ], $arguments[2]);

                return $arguments[0];
            })
        );

        $loggerProphecy = $this->prophesize(LoggerInterface::class);
        $loggerProphecy->addMethodProphecy(
            (new MethodProphecy($loggerProphecy, 'debug', [Argument::type('string')]))
                ->will(function ($arguments) use ($self) {
                    $self->assertSame('Hello "Slim"', $arguments[0]);
                })
        );

        /** @var Twig $twig */
        $twig = $twigProphecy->reveal();

        /** @var LoggerInterface $logger */
        $logger = $loggerProphecy->reveal();

        $helloController = new HelloController($twig, $logger);

        $serverRequest = $this->createMock(ServerRequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);

        $helloController($serverRequest, $response, ['name' => 'Slim']);
    }
}
