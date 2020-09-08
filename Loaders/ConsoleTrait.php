<?php

namespace Baconfy\Loaders;

use Baconfy\Traits\ReflectionTrait;
use File;
use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Scheduling\Schedule;

trait ConsoleTrait
{
    use ReflectionTrait;

    /**
     * @param $directory
     * @return void
     * @throws \ReflectionException
     */
    private function loadModuleCommands($directory)
    {
        $directory = $this->getClassDirectory($directory);

        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $file) {
                $router = app(get_class($file));

                Artisan::starting(function ($artisan) use ($router) {
                    $router->map($artisan);
                });

                $this->app->booted(function () use ($router) {
                    $router->schedule($this->app->make(Schedule::class));
                });
            }
        }
    }
}