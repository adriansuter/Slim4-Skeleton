<?php

declare(strict_types=1);

namespace App\Tests;

use App\ContainerFactory;
use Psr\Container\ContainerInterface;

class ContainerFactoryTest extends TestCase
{
    public function testCreate()
    {
        $container = ContainerFactory::create(__DIR__ . '/..');

        $this->assertInstanceOf(ContainerInterface::class, $container);
    }
}
