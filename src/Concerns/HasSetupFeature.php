<?php

namespace Hanafalah\LaravelFeature\Concerns;

trait HasSetupFeature
{
    protected $__feature, $__feature_version;

    /**
     * @return void
     */
    public function setFeatureModel(): void
    {
        $this->__feature         = $this->MasterFeatureModel();
        $this->__feature_version = $this->ModelHasVersionModel();
    }
}
