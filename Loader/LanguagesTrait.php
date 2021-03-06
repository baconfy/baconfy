<?php

namespace Baconfy\Loader;

use File;

trait LanguagesTrait
{
    /**
     * @param $directory
     * @return void
     */
    protected function loadModuleLanguages($directory)
    {
        $directory = $this->getClassDirectory($directory);

        if (File::isDirectory($directory)) {
            $this->loadTranslationsFrom($directory, $this->name);
        }
    }
}