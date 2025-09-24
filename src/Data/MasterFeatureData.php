<?php

namespace Hanafalah\LaravelFeature\Data;

use Hanafalah\LaravelFeature\Contracts\Data\MasterFeatureData as DataMasterFeatureData;

class MasterFeatureData extends FeatureStuffData implements DataMasterFeatureData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'MasterFeature';
        parent::before($attributes);
    }
}