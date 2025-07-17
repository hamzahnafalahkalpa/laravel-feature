<?php

namespace Hanafalah\LaravelFeature;

use Illuminate\Contracts\Container\Container;
use Hanafalah\LaravelFeature\Supports\BaseLaravelFeature;

class LaravelFeature extends BaseLaravelFeature
{
    /**
     * A description of the entire PHP function.
     *
     * @param Container $app The Container instance
     * @throws Exception description of exception
     * @return void
     */
    public function __construct()
    {
        $this->setConfig('laravel-feature', $this->__feature_config);
    }
}
