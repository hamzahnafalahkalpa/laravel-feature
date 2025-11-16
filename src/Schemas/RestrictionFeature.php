<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelFeature\{
    Supports\BaseLaravelFeature
};
use Hanafalah\LaravelFeature\Contracts\Schemas\RestrictionFeature as ContractsRestrictionFeature;
use Hanafalah\LaravelFeature\Contracts\Data\RestrictionFeatureData;

class RestrictionFeature extends BaseLaravelFeature implements ContractsRestrictionFeature
{
    protected string $__entity = 'RestrictionFeature';
    public $restriction_feature_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'restriction_feature',
            'tags'     => ['restriction_feature', 'restriction_feature-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreRestrictionFeature(RestrictionFeatureData $restriction_feature_dto): Model{
        $add = [
            'reference_type' => $restriction_feature_dto->reference_type,
            'reference_id'   => $restriction_feature_dto->reference_id,
            'model_type'     => $restriction_feature_dto->model_type,
            'model_id'       => $restriction_feature_dto->model_id,
        ];
        if (isset($restriction_feature_dto->id)){
            $guard  = ['id' => $restriction_feature_dto->id];
            $create = [$guard, $add];
        }else{
            $create = [$add];
        }

        $restriction_feature = $this->usingEntity()->updateOrCreate(...$create);

        $model = $this->{$restriction_feature_dto->model_type.'Model'}()->withoutGlobalScopes(['restriction'])->findOrFail($restriction_feature_dto->model_id);
        $model->is_restricted = true;
        $model->save();

        $this->fillingProps($restriction_feature,$restriction_feature_dto->props);
        $restriction_feature->save();
        return $this->restriction_feature_model = $restriction_feature;
    }
}