<?php

namespace Hanafalah\LaravelFeature\Contracts\Schemas;

use Hanafalah\LaravelFeature\Contracts\Data\FeatureStuffData;
//use Hanafalah\LaravelFeature\Contracts\Data\FeatureStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\LaravelFeature\Schemas\FeatureStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateFeatureStuff(?FeatureStuffData $feature_stuff_dto = null)
 * @method Model prepareUpdateFeatureStuff(FeatureStuffData $feature_stuff_dto)
 * @method bool deleteFeatureStuff()
 * @method bool prepareDeleteFeatureStuff(? array $attributes = null)
 * @method mixed getFeatureStuff()
 * @method ?Model prepareShowFeatureStuff(?Model $model = null, ?array $attributes = null)
 * @method array showFeatureStuff(?Model $model = null)
 * @method Collection prepareViewFeatureStuffList()
 * @method array viewFeatureStuffList()
 * @method LengthAwarePaginator prepareViewFeatureStuffPaginate(PaginateData $paginate_dto)
 * @method array viewFeatureStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeFeatureStuff(?FeatureStuffData $feature_stuff_dto = null)
 * @method Collection prepareStoreMultipleFeatureStuff(array $datas)
 * @method array storeMultipleFeatureStuff(array $datas)
 */

interface FeatureStuff extends DataManagement
{
    public function prepareStoreFeatureStuff(FeatureStuffData $feature_stuff_dto): Model;
}