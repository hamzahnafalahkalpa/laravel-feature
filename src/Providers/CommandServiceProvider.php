<?php

namespace Hanafalah\LaravelFeature\Providers;

use Illuminate\Support\ServiceProvider;
use Hanafalah\LaravelFeature\Commands;

class CommandServiceProvider extends ServiceProvider
{
    protected $__commands = [
        Commands\FeatureMakeCommand::class,
        Commands\InstallMakeCommand::class
    ];

    public function register()
    {
        $this->commands(config('laravel-feature.commands', $this->__commands));
    }

    public function provides()
    {
        return $this->__commands;
    }
}
