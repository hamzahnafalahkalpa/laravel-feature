<?php

namespace Hanafalah\LaravelFeature\Models;

use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelSupport\Models\BaseModel;

class RestrictionFeature extends BaseModel
{
    use HasUlids, SoftDeletes, HasProps;

    public $incrementing  = false;
    public $timestamps    = true;
    protected $primaryKey = 'id';
    protected $keyType    = 'string';
    protected $fillable   = [
        'id',
        'reference_type',
        'reference_id',
        'model_type',
        'model_id',
        'props'
    ];

    public function model(){return $this->morphTo();}
    public function reference(){return $this->morphTo();}
}
