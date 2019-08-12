<?php

declare(strict_types=1);

namespace App;

use DI\ContainerBuilder;
use Exception;
use Psr\Container\ContainerInterface;

class ContainerFactory
{
    /**
     * @param string $rootPath
     *
     * @return ContainerInterface
     * @throws Exception
     */
    public static function create(string $rootPath): ContainerInterface
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions([
            Preferences::class => new Preferences($rootPath),
        ]);
        $containerBuilder->addDefinitions($rootPath . '/application/config/container-definitions.php');
        $containerBuilder->addDefinitions($rootPath . '/application/config/container-controllers.php');

        // Note: In production, you should enable container-compilation.
        // $containerBuilder->enableCompilation($rootPath . '/cache');

        return $containerBuilder->build();
    }
}
