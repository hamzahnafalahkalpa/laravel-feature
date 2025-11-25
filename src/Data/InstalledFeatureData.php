<?php

namespace Hanafalah\LaravelFeature\Data;

use Hanafalah\LaravelFeature\Contracts\Data\InstalledFeatureData as DataInstalledFeatureData;
use Hanafalah\LaravelSupport\Supports\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class InstalledFeatureData extends Data implements DataInstalledFeatureData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('name')]
    #[MapName('name')]
    public ?string $name = NULL;

    #[MapInputName('model_type')]
    #[MapName('model_type')]
    public ?string $model_type = NULL;

    #[MapInputName('model_id')]
    #[MapName('model_id')]
    public mixed $model_id = null;

    #[MapInputName('master_feature_type')]
    #[MapName('master_feature_type')]
    public ?string $master_feature_type = null;

    #[MapInputName('master_feature_id')]
    #[MapName('master_feature_id')]
    public mixed $master_feature_id = null;

    #[MapInputName('version_id')]
    #[MapName('version_id')]
    public mixed $version_id = null;

    #[MapInputName('batch')]
    #[MapName('batch')]
    public ?int $batch = null;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;

    public static function after(self $data): self{
        $new = self::new();
        if (!isset($data->batch)){
            $current_installed = $new->InstalledFeatureModel()->where([
                ['model_type', $data->model_type], 
                ['model_id', $data->model_id], 
                ['master_feature_type', $data->master_feature_type],
                ['master_feature_id', $data->master_feature_id]
            ])->first();
            if (isset($current_installed)){
                $data->batch = $current_installed->batch + 1;
            }
        }
        return $data;
    }
}