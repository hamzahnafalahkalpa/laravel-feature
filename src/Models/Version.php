<?php

namespace Hanafalah\LaravelFeature\Models;

use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelFeature\Resources\Version\{
    ViewVersion,
    ShowVersion
};
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Version extends BaseModel
{
    use HasUlids, HasProps, SoftDeletes;
    
    public $incrementing  = false;
    protected $keyType    = 'string';
    protected $primaryKey = 'id';
    public $list = [
        'id',
        'name',
        'version',
        'master_feature_id',
        'price',
        'props'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public function viewUsingRelation(): array{
        return [];
    }

    public function showUsingRelation(): array{
        return [];
    }

    public function getViewResource(){
        return ViewVersion::class;
    }

    public function getShowResource(){
        return ShowVersion::class;
    }

    

    
}
