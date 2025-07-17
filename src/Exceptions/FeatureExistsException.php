<?php

namespace Hanafalah\LaravelFeature\Exceptions;

class FeatureExistsException extends \Exception
{
    public function __construct($feature)
    {
        parent::__construct("Feature '$feature' already exists.");
    }
}
