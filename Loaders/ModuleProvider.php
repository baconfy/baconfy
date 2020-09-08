<?php

namespace Baconfy\Loaders;

use Baconfy\Loader\Autoload;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    use Autoload;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->moduleLoaders();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->defaultLoaders();
    }
}