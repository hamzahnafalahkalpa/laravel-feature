<?php

namespace Hanafalah\LaravelFeature\Resources\FeatureStuff;

use Hanafalah\LaravelSupport\Resources\ApiResource;
use Hanafalah\LaravelSupport\Resources\Unicode\ViewUnicode;

class ViewFeatureStuff extends ViewUnicode
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $arr = [];
    $arr = $this->mergeArray($arr,parent::toArray($request));
    return $arr;
  }
}
