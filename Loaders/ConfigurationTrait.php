<?php

namespace Baconfy\Loaders;

use Baconfy\Traits\ReflectionTrait;
use File;

trait ConfigurationTrait
{
    use ReflectionTrait;

    /**
     * @param $directory
     * @return void
     * @throws \ReflectionException
     */
    protected function loadModuleConfiguration($directory)
    {
        $directory = $this->getClassDirectory($directory);

        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $file) {
                $this->mergeConfigFrom($file->getPathname(), $file->getBasename('.php'));
            }
        }
    }
}