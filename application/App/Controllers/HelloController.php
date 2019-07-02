<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;

class HelloController extends AbstractController
{
    /**
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args = []): Response
    {
        // Log a message.
        $logger = $this->container->get(LoggerInterface::class);
        $logger->debug(sprintf('Hello "%s"', $args ['name']));

        return $this->render($response, 'hello.twig', [
            'pageTitle' => 'Hello ' . $args['name'],
            'name' => $args['name'],
        ]);
    }
}
