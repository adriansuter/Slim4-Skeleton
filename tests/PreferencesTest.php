<?php

declare(strict_types=1);

namespace App\Tests;

use App\Preferences;

class PreferencesTest extends TestCase
{
    public function testGetRootPath()
    {
        $preferences = new Preferences('rootPath');
        $this->assertEquals('rootPath', $preferences->getRootPath());
    }
}
