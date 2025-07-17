<?php

namespace Hanafalah\LaravelFeature\Models\Feature;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelSupport\Models\BaseModel;

class ModelHasFeature extends BaseModel
{
    use HasUlids, SoftDeletes;

    public $incrementing  = false;
    public $timestamps    = true;
    protected $primaryKey = 'id';
    protected $keyType    = 'string';
    protected $fillable   = [
        'id',
        'model_type',
        'model_id',
        'master_feature_id',
        'feature_version_id'
    ];

    //EIGER SECTION
    public function model()
    {
        return $this->morphTo();
    }
    public function masterFeature()
    {
        return $this->belongsToModel('MasterFeature');
    }
    public function modelHasVersion()
    {
        return $this->morphOneModel('ModelHasVersion', 'model');
    }
    //END EIGER SECTION
}
