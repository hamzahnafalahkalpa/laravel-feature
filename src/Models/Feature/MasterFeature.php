<?php

namespace Hanafalah\LaravelFeature\Models\Feature;

use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelSupport\Models\{
    BaseModel
};
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class MasterFeature extends BaseModel
{
    use SoftDeletes, HasProps, HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table      = 'master_features';
    protected $fillable   = [
        'id',
        'parent_id',
        'name',
        'uuid'
    ];

    //EIGER SECTION
    public function modelHasVersion()
    {
        return $this->morphOneModel('ModelHasVersion', 'model');
    }
    public function modelHasVersions()
    {
        return $this->morphManyModel('ModelHasVersion', 'model');
    }
    //END EIGER SECTION
}
