<?php

namespace Baconfy\Loaders;

use Baconfy\Traits\ReflectionTrait;

trait ViewsTrait
{
    use ReflectionTrait;

    /**
     * Load view from container path
     * @param $directory
     * @throws \ReflectionException
     */
    protected function loadModuleViews($directory)
    {
        $this->loadViewsFrom($this->getClassDirectory($directory), $this->name);
    }
}
