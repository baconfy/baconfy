<?php

namespace Baconfy\Loaders;

use Baconfy\Traits\ReflectionTrait;
use File;

trait LanguagesTrait
{
    use ReflectionTrait;

    /**
     * @param $directory
     * @return void
     * @throws \ReflectionException
     */
    protected function loadModuleLanguages($directory)
    {
        $directory = $this->getClassDirectory($directory);

        if (File::isDirectory($directory)) {
            $this->loadTranslationsFrom($directory, $this->name);
        }
    }
}