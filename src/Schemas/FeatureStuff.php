<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelFeature\Contracts\Schemas\FeatureStuff as ContractsFeatureStuff;
use Hanafalah\LaravelFeature\Contracts\Data\FeatureStuffData;
use Hanafalah\LaravelSupport\Schemas\Unicode;
use Illuminate\Database\Eloquent\Builder;

class FeatureStuff extends Unicode implements ContractsFeatureStuff
{
    protected string $__entity = 'FeatureStuff';
    public $feature_stuff_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'feature_stuff',
            'tags'     => ['feature_stuff', 'feature_stuff-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreFeatureStuff(FeatureStuffData $feature_stuff_dto): Model{
        $feature_stuff = $this->prepareStoreUnicode($feature_stuff_dto);
        $this->fillingProps($feature_stuff,$feature_stuff_dto->props);
        $feature_stuff->save();
        return $this->feature_stuff_model = $feature_stuff;
    }

    public function featureStuff(mixed $conditionals = null): Builder{
        return $this->unicode($conditionals);
    }
}