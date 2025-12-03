<?php

namespace Hanafalah\LaravelFeature\Concerns;

trait HasRestrictionFeature
{
    public static function bootHasRestrictionFeature()
    {
        static::addGlobalScope('restriction',function ($query) {
            $used_restrictions = (new static)->usedRestrictionAs();
            if (in_array('model', $used_restrictions)) {
                $query->where('props->is_restricted',false);
            }
        });
    }

    public function asModelRestriction(){
        return $this->morphOneModel('RestrictionFeature', 'model');
    }

    public function asModelRestrictions(){
        return $this->morphManyModel('RestrictionFeature', 'model');
    }

    public function asReferenceRestriction(){
        return $this->morphOneModel('RestrictionFeature', 'reference');
    }

    public function asReferenceRestrictions(){
        return $this->morphManyModel('RestrictionFeature', 'reference');
    }
}