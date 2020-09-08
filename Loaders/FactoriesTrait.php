<?php

namespace Baconfy\Loaders;

use Baconfy\Traits\ReflectionTrait;
use File;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factory;

trait FactoriesTrait
{
    use ReflectionTrait;

    /**
     * @param $directory
     * @throws \ReflectionException
     */
    protected function loadModuleFactories($directory)
    {
        $directory = $this->getClassDirectory($directory);

        if (File::isDirectory($directory)) {
            $this->app->singleton(Factory::class, function ($app) use ($directory) {
                return Factory::construct($this->app->make(Generator::class), $directory);
            });
        }
    }
}