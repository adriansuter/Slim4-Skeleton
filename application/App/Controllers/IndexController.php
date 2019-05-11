<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class IndexController extends AbstractController
{

    public function __invoke(Request $request, Response $response, array $args = []): Response
    {
        /** @var Twig $view */
        $view = $this->container->get('view');
        return $view->render($response, 'index.twig', [
            'name' => 'Adrian'
        ]);
    }

}
