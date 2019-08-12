<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class HelloController extends AbstractTwigController
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * HelloController constructor.
     *
     * @param Twig            $twig
     * @param LoggerInterface $logger
     */
    public function __construct(Twig $twig, LoggerInterface $logger)
    {
        parent::__construct($twig);

        $this->logger = $logger;
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args = []): Response
    {
        $this->logger->debug(sprintf('Hello "%s"', $args ['name']));

        return $this->render($response, 'hello.twig', [
            'pageTitle' => 'Hello ' . $args['name'],
            'name' => $args['name'],
        ]);
    }
}
