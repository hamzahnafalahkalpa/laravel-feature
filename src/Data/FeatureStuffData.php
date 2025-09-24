<?php

namespace Hanafalah\LaravelFeature\Data;

use Hanafalah\LaravelFeature\Contracts\Data\FeatureStuffData as DataFeatureStuffData;
use Hanafalah\LaravelSupport\Data\UnicodeData;

class FeatureStuffData extends UnicodeData implements DataFeatureStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'FeatureStuff';
        parent::before($attributes);
    }
}