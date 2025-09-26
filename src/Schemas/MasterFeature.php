<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Hanafalah\LaravelFeature\Contracts\Data\MasterFeatureData;
use Hanafalah\LaravelFeature\Contracts\Schemas\MasterFeature as SchemasMasterFeature;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MasterFeature extends FeatureStuff implements SchemasMasterFeature
{
    protected string $__entity = 'MasterFeature';
    public $master_feature_model;

    public function prepareStoreMasterFeature(MasterFeatureData $master_feature_dto): Model{
        $master_feature = $this->prepareStoreUnicode($master_feature_dto);

        if (isset($master_feature_dto->version)){
            $version_dto = &$master_feature_dto->version;
            $version_dto->master_feature_model = $master_feature;
            $version_dto->master_feature_id = $master_feature->getKey();
            $this->schemaContract('version')->prepareStoreVersion($version_dto);
        }

        $this->fillingProps($master_feature,$master_feature_dto->props);
        $master_feature->save();
        return $this->master_feature_model = $master_feature;
    }

    public function masterFeature(mixed $conditionals = null): Builder{
        return $this->featureStuff($conditionals);
    }
}
