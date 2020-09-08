<?php

namespace Baconfy\Loader;

trait ViewsTrait
{
    /**
     * Load view from container path
     * @param $directory
     */
    protected function loadModuleViews($directory)
    {
        $this->loadViewsFrom($this->getClassDirectory($directory), $this->name);
    }
}
