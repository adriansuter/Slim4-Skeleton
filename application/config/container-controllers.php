<?php

declare(strict_types=1);

use App\Controllers\ExceptionDemoController;
use App\Controllers\HelloController;
use App\Controllers\HomeController;
use App\Preferences;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

return [
    ExceptionDemoController::class => function (ContainerInterface $container): ExceptionDemoController {
        return new ExceptionDemoController();
    },
    HelloController::class => function (ContainerInterface $container): HelloController {
        return new HelloController($container->get(Twig::class), $container->get(LoggerInterface::class));
    },
    HomeController::class => function (ContainerInterface $container): HomeController {
        return new HomeController($container->get(Twig::class), $container->get(Preferences::class));
    }
];
