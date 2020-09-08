<?php

namespace Baconfy;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;
use Baconfy\Loader\ProvidersTrait;

class BaconfyServiceProvider extends ServiceProvider
{
    use ProvidersTrait;

    /**
     * Register providers.
     *
     * @var  array
     */
    protected $providers = [
        RouteServiceProvider::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadProviders($this->providers);
    }
}