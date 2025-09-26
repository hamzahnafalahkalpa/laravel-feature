<?php

namespace Hanafalah\LaravelFeature\Data;

use Hanafalah\LaravelFeature\Contracts\Data\VersionData as DataVersionData;
use Hanafalah\LaravelSupport\Supports\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class VersionData extends Data implements DataVersionData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('name')]
    #[MapName('name')]
    public string $name;

    #[MapInputName('version')]
    #[MapName('version')]
    public string $version;

    #[MapInputName('price')]
    #[MapName('price')]
    public ?int $price = null;

    #[MapInputName('master_feature_id')]
    #[MapName('master_feature_id')]
    public mixed $master_feature_id;

    #[MapInputName('master_feature_model')]
    #[MapName('master_feature_model')]
    public ?object $master_feature_model = null;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;

    public static function before(array &$attributes){
        $attributes['price'] ??= 0;
    }
}