<?php

namespace Hanafalah\LaravelFeature\Data;

use Hanafalah\LaravelFeature\Contracts\Data\MasterFeatureData as DataMasterFeatureData;
use Hanafalah\LaravelFeature\Contracts\Data\VersionData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class MasterFeatureData extends FeatureStuffData implements DataMasterFeatureData
{
    #[MapInputName('version')]
    #[MapName('version')]
    public ?VersionData $version = null;

    public static function before(array &$attributes){
        $attributes['flag'] ??= 'MasterFeature';
        $attributes['price'] ??= 0;

        if (isset($attributes['version'])){
            $attributes['version']['name'] ??= $attributes['name'].' '.$attributes['version']['version'];
        }

        parent::before($attributes);
    }
}