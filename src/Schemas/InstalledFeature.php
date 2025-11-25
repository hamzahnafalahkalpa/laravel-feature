<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelFeature\{
    Supports\BaseLaravelFeature
};
use Hanafalah\LaravelFeature\Contracts\Schemas\InstalledFeature as ContractsInstalledFeature;
use Hanafalah\LaravelFeature\Contracts\Data\InstalledFeatureData;

class InstalledFeature extends BaseLaravelFeature implements ContractsInstalledFeature
{
    protected string $__entity = 'InstalledFeature';
    public $installed_feature_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'installed_feature',
            'tags'     => ['installed_feature', 'installed_feature-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreInstalledFeature(InstalledFeatureData $installed_feature_dto): Model{
        $add = [
            'name' => $installed_feature_dto->name
        ];
        if (isset($installed_feature_dto->batch)){
            $add['batch'] = $installed_feature_dto->batch;
        }
        if (isset($installed_feature_dto->id)) {
            $guard  = ['id' => $installed_feature_dto->id];
        }else{
            $guard = [
                'model_type' => $installed_feature_dto->model_type,
                'model_id' => $installed_feature_dto->model_id,
                'master_feature_type' => $installed_feature_dto->master_feature_type,
                'master_feature_id' => $installed_feature_dto->master_feature_id,
                'version_id' => $installed_feature_dto->version_id
            ];
        }
        $create = [$guard, $add];
        $installed_feature = $this->usingEntity()->updateOrCreate(...$create);
        $this->fillingProps($installed_feature,$installed_feature_dto->props);
        $installed_feature->save();
        return $this->installed_feature_model = $installed_feature;
    }
}