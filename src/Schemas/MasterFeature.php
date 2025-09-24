<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Hanafalah\LaravelFeature\{
    Supports\BaseLaravelFeature
};
use Hanafalah\LaravelFeature\Contracts\Data\MasterFeatureData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MasterFeature extends BaseLaravelFeature implements DataManagement
{
    protected string $__entity = 'MasterFeature';
    public $master_feature_model;

    public function prepareStoreMasterFeature(MasterFeatureData $master_feature_dto): Model{
        $master_feature = $this->prepareStoreUnicode($master_feature_dto);
        $this->fillingProps($master_feature,$master_feature_dto->props);
        $master_feature->save();
        return $this->master_feature_model = $master_feature;
    }

    public function masterFeature(mixed $conditionals = null): Builder{
        return $this->featureStuff($conditionals);
    }
}
