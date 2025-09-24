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

    #[MapInputName('master_feature_id')]
    #[MapName('master_feature_id')]
    public mixed $master_feature_id;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;
}