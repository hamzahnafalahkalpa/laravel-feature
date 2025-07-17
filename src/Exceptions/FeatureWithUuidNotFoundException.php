<?php

namespace Hanafalah\LaravelFeature\Exceptions;

class FeatureWithUuidNotFoundException extends \Exception
{
    public function __construct($uuid)
    {
        parent::__construct("Feature with uuid '$uuid' not found.");
    }
}
