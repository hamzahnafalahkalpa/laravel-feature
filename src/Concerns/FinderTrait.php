<?php

namespace Hanafalah\LaravelFeature\Concerns;

use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelFeature\Exceptions\{
    FeatureNotFoundException,
    FeatureWithNameNotFoundException,
    FeatureWithUuidNotFoundException
};

trait FinderTrait
{
    /**
     * A description of the entire PHP function.
     *
     * @param datatype $paramname description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function find($featureId, $exceptions = false): Model|null
    {
        $model = $this->__model->where(function ($q) use ($featureId) {
            $q->where($this->__model->getKeyName(), $featureId)->orWhere('uuid', $featureId);
        })->first();
        if (!isset($model) && $exceptions) {
            throw new FeatureNotFoundException($featureId);
        } else {
            $this->__model = $model ?? $this->__model;
        }
        return $model;
    }

    /**
     * Finds a model by its UUID and returns it.
     *
     * @param mixed $uuid The UUID of the model to find.
     * @throws FeatureWithUuidNotFoundException If the model with the given UUID is not found.
     * @return Model The found model.
     */
    public function findByUuid($uuid, $exceptions = false): Model|null
    {
        $model = $this->__model->where('uuid', $uuid)->first();
        if (!isset($model) && $exceptions) {
            throw new FeatureWithUuidNotFoundException($uuid);
        } else {
            $this->__model = $model ?? $this->__model;
        }
        return $model;
    }

    /**
     * Finds a model by its name and returns it.
     *
     * @param string $name The name of the model to find.
     * @throws FeatureWithNameNotFoundException If the model with the given name is not found.
     * @return Model The found model.
     */
    public function findByName($name, $exceptions = false): Model|null
    {
        $model = $this->__model->where('name', $name)->first();
        if (!isset($model) && $exceptions) {
            throw new FeatureWithNameNotFoundException($name);
        } else {
            $this->__model = $model ?? $this->__model;
        }
        return $model;
    }
}
