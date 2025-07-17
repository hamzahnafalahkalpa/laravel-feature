<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Hanafalah\LaravelFeature\Supports\BaseLaravelFeature;

class ModuleVersion extends BaseLaravelFeature
{
    public function booting(): self
    {
        static::$__class = $this;
        static::$__model = $this->{$this->__entity . "Model"}();
        return $this;
    }

    protected array $__guard   = ['id', 'model_type', 'model_id', 'name'];
    protected array $__add     = ['name'];
    protected string $__entity = 'ModelHasVersion';

    /**
     * Add a new API access or update the existing one if found.
     *
     * The given attributes will be merged with the existing API access.
     *
     * @param array $attributes The attributes to be added to the API access.
     *
     * @return \Illuminate\Database\Eloquent\Model The API access model.
     */
    public function addOrChange(?array $attributes = []): self
    {
        $this->updateOrCreate($attributes);
        $this->__feature_version = self::$__model;
        return $this;
    }
}
