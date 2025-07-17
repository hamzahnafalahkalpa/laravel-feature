<?php

namespace Hanafalah\LaravelFeature\Exceptions;

class FeatureNotFoundException extends \Exception
{
    public function __construct($feature)
    {
        parent::__construct("Feature with id '$feature' not found.");
    }
}
