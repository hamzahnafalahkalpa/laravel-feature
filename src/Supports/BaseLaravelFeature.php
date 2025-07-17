<?php

namespace Hanafalah\LaravelFeature\Supports;

use Hanafalah\LaravelSupport\Supports\PackageManagement;
use Hanafalah\LaravelFeature\Concerns;

class BaseLaravelFeature extends PackageManagement
{
    use Concerns\HasSetupFeature;
    use Concerns\FinderTrait;

    /** @var array */
    protected $__feature_config = [];
}
