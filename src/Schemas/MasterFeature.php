<?php

namespace Hanafalah\LaravelFeature\Schemas;

use Hanafalah\LaravelFeature\{
    Supports\BaseLaravelFeature
};
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;

class MasterFeature extends BaseLaravelFeature implements DataManagement
{
    protected string $__entity = 'MasterFeature';
    protected $__feature;

    /**
     * Add a new feature version to the master feature.
     *
     * @param string $version The version name.
     *
     * @return self The current instance.
     */
    public function addFeatureVersion($version): self
    {
        $model = self::$__model;
        $this->childSchema(ModuleVersion::class, function ($class) use ($version, $model) {
            $class->add([
                'model_id'   => $model->getKey(),
                'model_type' => $model->getMorphClass(),
                'name'       => $version
            ]);
        });
        return $this;
    }

    public function remove($featureId = null): self
    {
        $featureId ??= $this->__feature->getKey();
        if (isset($featureId)) $this->MasterFeatureModel()->delete($featureId);
        return $this;
    }

    //GETTER SECTION
    public function getFeatureList($conditionls = null): \Illuminate\Database\Eloquent\Collection{
        return $this->MasterFeatureModel()->conditionals($conditionls)->get();
    }
    //END GETTER SECTION
}
