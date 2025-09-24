<?php

namespace Hanafalah\LaravelFeature\Contracts\Schemas;

use Hanafalah\LaravelFeature\Contracts\Data\InstalledFeatureData;
//use Hanafalah\LaravelFeature\Contracts\Data\InstalledFeatureUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\LaravelFeature\Schemas\InstalledFeature
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateInstalledFeature(?InstalledFeatureData $installed_feature_dto = null)
 * @method Model prepareUpdateInstalledFeature(InstalledFeatureData $installed_feature_dto)
 * @method bool deleteInstalledFeature()
 * @method bool prepareDeleteInstalledFeature(? array $attributes = null)
 * @method mixed getInstalledFeature()
 * @method ?Model prepareShowInstalledFeature(?Model $model = null, ?array $attributes = null)
 * @method array showInstalledFeature(?Model $model = null)
 * @method Collection prepareViewInstalledFeatureList()
 * @method array viewInstalledFeatureList()
 * @method LengthAwarePaginator prepareViewInstalledFeaturePaginate(PaginateData $paginate_dto)
 * @method array viewInstalledFeaturePaginate(?PaginateData $paginate_dto = null)
 * @method array storeInstalledFeature(?InstalledFeatureData $installed_feature_dto = null)
 * @method Collection prepareStoreMultipleInstalledFeature(array $datas)
 * @method array storeMultipleInstalledFeature(array $datas)
 */

interface InstalledFeature extends DataManagement
{
    public function prepareStoreInstalledFeature(InstalledFeatureData $installed_feature_dto): Model;
}