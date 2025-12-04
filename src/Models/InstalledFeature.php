<?php

namespace Hanafalah\LaravelFeature\Models;

use Hanafalah\LaravelHasProps\Concerns\HasCurrent;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelSupport\Models\BaseModel;

class InstalledFeature extends BaseModel
{
    use HasUlids, SoftDeletes, HasProps, HasCurrent;

    public $incrementing  = false;
    public $timestamps    = true;
    protected $primaryKey = 'id';
    protected $keyType    = 'string';
    protected $fillable   = [
        'id',
        'name',
        'model_type',
        'model_id',
        'master_feature_type',
        'master_feature_id',
        'version_id',
        'batch',
        'current',
        'props'
    ];

    public function getConditions(): array{
        return ['model_type', 'model_id', 'master_feature_type', 'master_feature_id'];
    }

    public function model(){return $this->morphTo();}
    public function version(){return $this->belongsToModel('Version');}
    public function masterFeature(){return $this->morphTo();}
}
