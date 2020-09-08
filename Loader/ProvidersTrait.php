<?php

namespace Baconfy\Loader;

use App;

trait ProvidersTrait
{
    /**
     * @param array $providers
     */
    protected function loadProviders(array $providers)
    {
        foreach ($this->providers as $provider) {
            $this->loadServiceProvider($provider);
        }
    }

    /**
     * @param $provider
     */
    protected function loadServiceProvider($provider)
    {
        App::register($provider);
    }
}