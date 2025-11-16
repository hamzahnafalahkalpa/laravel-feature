<?php

namespace Hanafalah\LaravelFeature\Data;

use Hanafalah\LaravelFeature\Contracts\Data\RestrictionFeatureData as DataRestrictionFeatureData;
use Hanafalah\LaravelSupport\Supports\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class RestrictionFeatureData extends Data implements DataRestrictionFeatureData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('reference_type')]
    #[MapName('reference_type')]
    public string $reference_type;

    #[MapInputName('reference_id')]
    #[MapName('reference_id')]
    public mixed $reference_id;

    #[MapInputName('model_type')]
    #[MapName('model_type')]
    public string $model_type;

    #[MapInputName('model_id')]
    #[MapName('model_id')]
    public mixed $model_id;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;
}