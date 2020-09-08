<?php

namespace Baconfy\Loaders;

use Baconfy\Traits\ReflectionTrait;
use File;

trait MigrationsTrait
{
    use ReflectionTrait;

    /**
     * @param $directory
     * @throws \ReflectionException
     */
    protected function loadModuleMigrations($directory)
    {
        $directory = $this->getClassDirectory($directory);

        if (File::isDirectory($directory)) {
            $this->loadMigrationsFrom($directory);
        }
    }
}