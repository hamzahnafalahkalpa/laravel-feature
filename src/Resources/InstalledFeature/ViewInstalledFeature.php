<?php

namespace Hanafalah\LaravelFeature\Resources\InstalledFeature;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewInstalledFeature extends ApiResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $arr = [
        'id' => $this->id,
        'name' => $this->name,
        'model_type' => $this->model_type,
        'model_id' => $this->model_id,
        'master_feature_type' => $this->master_feature_type,
        'master_feature_id' => $this->master_feature_id,
        'version_id' => $this->version_id
    ];
    return $arr;
  }
}
