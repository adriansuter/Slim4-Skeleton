<?php

declare(strict_types=1);

use App\Controllers\HelloController;
use App\Controllers\IndexController;
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// Set the default timezone.
date_default_timezone_set('Europe/Zurich');

// Set the absolute path to the root directory.
$rootPath = realpath(__DIR__ . '/..');

// Include the autoloader.
include_once($rootPath . '/vendor/autoload.php');

// Create the container for dependency injection.
$container = new Container();

// Set the container to create the App with AppFactory.
AppFactory::setContainer($container);
$app = AppFactory::create();

$twig = new Twig(
    $rootPath . '/application/templates',
    [
        'cache' => $rootPath . '/cache',
        'auto_reload' => true,
        'debug' => false,
    ]
);
$app->add(
    new TwigMiddleware($twig, $container, $app->getRouteCollector()->getRouteParser(), $app->getBasePath())
);

$app->group('/', function (RouteCollectorProxy $group) {
    $group->get('', IndexController::class)->setName('index');
    $group->get('hello/{name}', HelloController::class)->setName('hello');
});

$app->run();
