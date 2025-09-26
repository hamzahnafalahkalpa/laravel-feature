<?php

namespace Hanafalah\LaravelFeature\Contracts\Schemas;

use Hanafalah\LaravelFeature\Contracts\Data\MasterFeatureData;
use Hanafalah\LaravelSupport\Contracts\Schemas\Unicode;
//use Hanafalah\LaravelFeature\Contracts\Data\MasterFeatureUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\LaravelFeature\Schemas\MasterFeature
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateMasterFeature(?MasterFeatureData $master_feature_dto = null)
 * @method Model prepareUpdateMasterFeature(MasterFeatureData $master_feature_dto)
 * @method bool deleteMasterFeature()
 * @method bool prepareDeleteMasterFeature(? array $attributes = null)
 * @method mixed getMasterFeature()
 * @method ?Model prepareShowMasterFeature(?Model $model = null, ?array $attributes = null)
 * @method array showMasterFeature(?Model $model = null)
 * @method Collection prepareViewMasterFeatureList()
 * @method array viewMasterFeatureList()
 * @method LengthAwarePaginator prepareViewMasterFeaturePaginate(PaginateData $paginate_dto)
 * @method array viewMasterFeaturePaginate(?PaginateData $paginate_dto = null)
 * @method array storeMasterFeature(?MasterFeatureData $master_feature_dto = null)
 * @method Collection prepareStoreMultipleMasterFeature(array $datas)
 * @method array storeMultipleMasterFeature(array $datas)
 */

interface MasterFeature extends FeatureStuff
{
    public function prepareStoreMasterFeature(MasterFeatureData $master_feature_dto): Model;
    public function masterFeature(mixed $conditionals = null): Builder;
}