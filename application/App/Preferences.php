<?php

declare(strict_types=1);

namespace App;

class Preferences
{
    /**
     * @var string
     */
    private $rootPath;

    /**
     * Preferences constructor.
     *
     * @param string $rootPath
     */
    public function __construct(string $rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * @return string
     */
    public function getRootPath(): string
    {
        return $this->rootPath;
    }
}
