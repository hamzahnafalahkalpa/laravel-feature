<?php

namespace Hanafalah\LaravelFeature\Contracts\Schemas;

use Hanafalah\LaravelFeature\Contracts\Data\RestrictionFeatureData;
//use Hanafalah\LaravelFeature\Contracts\Data\RestrictionFeatureUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\LaravelFeature\Schemas\RestrictionFeature
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateRestrictionFeature(?RestrictionFeatureData $restriction_feature_dto = null)
 * @method Model prepareUpdateRestrictionFeature(RestrictionFeatureData $restriction_feature_dto)
 * @method bool deleteRestrictionFeature()
 * @method bool prepareDeleteRestrictionFeature(? array $attributes = null)
 * @method mixed getRestrictionFeature()
 * @method ?Model prepareShowRestrictionFeature(?Model $model = null, ?array $attributes = null)
 * @method array showRestrictionFeature(?Model $model = null)
 * @method Collection prepareViewRestrictionFeatureList()
 * @method array viewRestrictionFeatureList()
 * @method LengthAwarePaginator prepareViewRestrictionFeaturePaginate(PaginateData $paginate_dto)
 * @method array viewRestrictionFeaturePaginate(?PaginateData $paginate_dto = null)
 * @method array storeRestrictionFeature(?RestrictionFeatureData $restriction_feature_dto = null)
 * @method Collection prepareStoreMultipleRestrictionFeature(array $datas)
 * @method array storeMultipleRestrictionFeature(array $datas)
 */

interface RestrictionFeature extends DataManagement
{
    public function prepareStoreRestrictionFeature(RestrictionFeatureData $restriction_feature_dto): Model;
}