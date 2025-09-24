<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelFeature\{
    Supports\BaseLaravelFeature
};
use Hanafalah\LaravelFeature\Contracts\Schemas\Version as ContractsVersion;
use Hanafalah\LaravelFeature\Contracts\Data\VersionData;

class Version extends BaseLaravelFeature implements ContractsVersion
{
    protected string $__entity = 'Version';
    public $version_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'version',
            'tags'     => ['version', 'version-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreVersion(VersionData $version_dto): Model{
        $add = [
            'name' => $version_dto->name,
        ];

        if (isset($version_dto->id)){
            $guard = ['id' => $version_dto->id];
        }else{
            $guard = [
                'version' => $version_dto->version,
                'master_feature_id' => $version_dto->master_feature_id
            ];
        }
        $create = [$guard, $add];
        $version = $this->usingEntity()->updateOrCreate(...$create);
        $this->fillingProps($version,$version_dto->props);
        $version->save();
        return $this->version_model = $version;
    }
}