<?php

namespace Hanafalah\LaravelFeature\Contracts;

use Illuminate\Contracts\Container\Container;

interface LaravelFeature
{
    public function __construct(Container $app);
    public function add($featureName, $version = '1.0'): self;
    public function addPatch($version): self;
    public function remove($featureId = null): self;
    public function enable($featureId = null): self;
    public function disable($featureId = null): self;
    public function define(string $name, string|callable $callback): mixed;
    public function for($entity): self;
    public function find($featureId);
    public function findByUuid($uuid);
    public function findByName($name);
    public function getFeatureCodeName($featureId = null): string;
    public function getModel($featureId = null);
    public function setPatch($model_version): self;
}
