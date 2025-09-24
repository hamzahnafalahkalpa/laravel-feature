<?php

namespace Hanafalah\LaravelFeature;

use Hanafalah\LaravelSupport\Providers\BaseServiceProvider;

class LaravelFeatureServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->registerMainClass(LaravelFeature::class)
            ->registerCommandService(Providers\CommandServiceProvider::class)
            ->registers(['*']);
    }

    /**
     * Get the base path for the package.
     *
     * @return string The base path for the package.
     */
    protected function dir(): string
    {
        return __DIR__ . '/';
    }
}
