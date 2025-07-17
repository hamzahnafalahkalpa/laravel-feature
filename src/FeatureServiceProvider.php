<?php

namespace Hanafalah\LaravelFeature;

use Hanafalah\LaravelFeature\{
    Providers\CommandServiceProvider,
};
use Hanafalah\LaravelFeature\{
    Contracts\LaravelFeature as ContractsLaravelFeature
};

use Hanafalah\LaravelSupport\Providers\BaseServiceProvider;

abstract class FeatureServiceProvider extends BaseServiceProvider
{

    protected function dir(): string
    {
        return __DIR__ . '/';
    }

    protected function registerProvider(): self
    {
        $this->app->register(CommandServiceProvider::class);
        return $this;
    }

    public function registerNamespace(): self
    {
        $this->publishes([
            $this->getConfigFullPath() => config_path('laravel-feature.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../assets/stubs' => base_path('Stubs/FeatureStubs'),
        ], 'stubs');

        $this->publishes($this->scanMigration(), 'migrations');
        return $this;
    }

    public function registerConfig(): self
    {
        $this->mergeConfigWith('laravel-feature')
            ->setLocalConfig('laravel-feature');
        return $this;
    }

    /**
     * Registers the morph map for the models.
     *
     * @return $this The current instance of the class.
     */
    protected function registerModel(): self
    {
        $this->morphMap($this->__local_config['database']['models']);
        return $this;
    }

    protected function registerServices(): self
    {
        $this->app->singleton(LaravelFeature::class);

        $this->app->bind(ContractsLaravelFeature::class, function ($app) {
            return new LaravelFeature();
        });
        return $this;
    }

    protected function registerDatabase(): self
    {
        $this->setAppModels($this->__local_config['database']['models']);
        return $this;
    }
}
