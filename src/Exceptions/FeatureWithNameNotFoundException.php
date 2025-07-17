<?php

namespace Hanafalah\LaravelFeature\Exceptions;

class FeatureWithNameNotFoundException extends \Exception
{
    public function __construct($name)
    {
        parent::__construct("Feature with name '$name' not found.");
    }
}
