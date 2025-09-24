<?php

namespace Hanafalah\LaravelFeature\Models;

class MasterFeature extends FeatureStuff
{
    protected $table = 'unicodes';

    public function getForeignKey(){
        return 'master_feature_id';
    }

    public function version(){return $this->hasOneModel('Version');}
    public function installedFeature(){return $this->hasOneModel('InstalledFeature');}
    public function installedFeatures(){return $this->hasManyModel('InstalledFeature');}
}
