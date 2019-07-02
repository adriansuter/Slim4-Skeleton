<?php

declare(strict_types=1);

use App\ContainerFactory;
use App\Controllers\ExceptionDemoController;
use App\Controllers\HelloController;
use App\Controllers\HomeController;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Slim\Routing\RouteCollectorProxy;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// Set the default timezone.
date_default_timezone_set('Europe/Zurich');

// Set the absolute path to the root directory.
$rootPath = realpath(__DIR__ . '/..');

// Include the composer autoloader.
include_once($rootPath . '/vendor/autoload.php');

// Create the container for dependency injection.
try {
    $container = ContainerFactory::create($rootPath);
} catch (Exception $e) {
    die($e->getMessage());
}

// Set the container to create the App with AppFactory.
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add error handling middleware.
$displayErrorDetails = true;
$logErrors = true;
$logErrorDetails = false;

$errorMiddleware = new ErrorMiddleware(
    $app->getCallableResolver(),
    $app->getResponseFactory(),
    $displayErrorDetails,
    true,
    false
);
$app->add($errorMiddleware);

// Add the twig middleware (which when processed would set the 'view' to the container).
$app->add(
    new TwigMiddleware(
        new Twig(
            $rootPath . '/application/templates',
            [
                'cache' => $rootPath . '/cache',
                'auto_reload' => true,
                'debug' => false,
            ]
        ),
        $container,
        $app->getRouteCollector()->getRouteParser(),
        $app->getBasePath()
    )
);

// Define the app routes.
$app->group('/', function (RouteCollectorProxy $group) {
    $group->get('', HomeController::class)->setName('home');
    $group->get('hello/{name}', HelloController::class)->setName('hello');
    $group->get('exception-demo', ExceptionDemoController::class)->setName('exception-demo');
});

// Run the app.
$app->run();
