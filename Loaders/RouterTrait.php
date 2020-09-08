<?php

namespace Baconfy\Loaders;

use Baconfy\Traits\ReflectionTrait;
use File;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

trait RouterTrait
{
    use ReflectionTrait;

    public function map()
    {
        $this->loadModuleRoutes('Ui/Api/Routes', 'api');
        $this->loadModuleRoutes('Ui/Web/Routes', 'web');
    }

    /**
     * @param string $directory
     * @param string $type
     * @return void
     * @throws \ReflectionException
     */
    private function loadModuleRoutes(string $directory, string $type)
    {
        // Get module directory
        $directory = $this->getClassDirectory($directory);

        // Namespace definition
        $controllers = sprintf('%s\\Ui\\%s\\%s', $this->namespace, ucfirst($type), 'Controllers');
        $routes = sprintf('%s\\Ui\\%s\\%s', $this->namespace, ucfirst($type), 'Routes');

        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $file) {
                $class = $this->app->make("{$routes}\\{$file->getBasename('.php')}");
                $middlewares = $class->getMiddlewares($type);

                Route::group(['namespace' => $controllers, 'middleware' => $middlewares], function (Registrar $router) use ($file, $class) {
                    $class->map($router);
                });
            }
        }
    }
}