<?php

namespace Hanafalah\LaravelFeature\Concerns;

use Laravel\Pennant\Feature;

trait PennantTrait
{
    public function define(string $name, string|callable $callback): mixed
    {
        Feature::define($name, function () use ($callback) {
            return (\is_callable($callback)) ? $callback() : $callback;
        });
        return new Feature;
    }
}
