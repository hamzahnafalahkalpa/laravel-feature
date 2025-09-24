<?php

namespace Hanafalah\LaravelFeature\Contracts\Schemas;

use Hanafalah\LaravelFeature\Contracts\Data\VersionData;
//use Hanafalah\LaravelFeature\Contracts\Data\VersionUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\LaravelFeature\Schemas\Version
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateVersion(?VersionData $version_dto = null)
 * @method Model prepareUpdateVersion(VersionData $version_dto)
 * @method bool deleteVersion()
 * @method bool prepareDeleteVersion(? array $attributes = null)
 * @method mixed getVersion()
 * @method ?Model prepareShowVersion(?Model $model = null, ?array $attributes = null)
 * @method array showVersion(?Model $model = null)
 * @method Collection prepareViewVersionList()
 * @method array viewVersionList()
 * @method LengthAwarePaginator prepareViewVersionPaginate(PaginateData $paginate_dto)
 * @method array viewVersionPaginate(?PaginateData $paginate_dto = null)
 * @method array storeVersion(?VersionData $version_dto = null)
 * @method Collection prepareStoreMultipleVersion(array $datas)
 * @method array storeMultipleVersion(array $datas)
 */

interface Version extends DataManagement
{
    public function prepareStoreVersion(VersionData $version_dto): Model;
}