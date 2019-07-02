<?php

declare(strict_types=1);

namespace App\Controllers;

use ErrorException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ExceptionDemoController extends AbstractController
{
    /**
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     * @throws ErrorException
     */
    public function __invoke(Request $request, Response $response, array $args = []): Response
    {
        throw new ErrorException('Custom exception', 9);
    }
}
