# CLAUDE.md

This file provides guidance to Claude Code when working with the laravel-feature package.

## Overview

`hanafalah/laravel-feature` is a Laravel package for managing application features, versioning, and feature restrictions. It provides a comprehensive system for:

- **Master Features**: Define available features in the application
- **Feature Versions**: Track different versions of features with pricing
- **Installed Features**: Track which features are installed for specific models (tenants, users, etc.)
- **Feature Restrictions**: Restrict access to features based on model relationships

**Namespace:** `Hanafalah\LaravelFeature`

**Dependencies:**
- `hanafalah/laravel-support` - Base support package
- `hanafalah/module-service` - Service module integration

## Directory Structure

```
src/
├── Commands/               # Artisan commands
│   ├── FeatureMakeCommand.php      # php artisan feature:make {name}
│   ├── InstallMakeCommand.php      # php artisan feature:install
│   └── EnvironmentCommand.php      # Base command class
├── Concerns/
│   └── HasRestrictionFeature.php   # Trait for models with restrictions
├── Contracts/
│   ├── Data/               # Data transfer object interfaces
│   ├── Schemas/            # Schema interfaces
│   └── LaravelFeature.php  # Main contract
├── Data/                   # Data transfer objects (Spatie Laravel Data)
│   ├── MasterFeatureData.php
│   ├── VersionData.php
│   ├── InstalledFeatureData.php
│   ├── RestrictionFeatureData.php
│   └── FeatureStuffData.php
├── Exceptions/             # Custom exceptions
│   ├── FeatureNotFoundException.php
│   ├── FeatureNotSetException.php
│   ├── FeatureExistsException.php
│   ├── FeatureWithNameNotFoundException.php
│   └── FeatureWithUuidNotFoundException.php
├── Models/                 # Eloquent models
│   ├── MasterFeature.php
│   ├── Version.php
│   ├── InstalledFeature.php
│   ├── RestrictionFeature.php
│   └── FeatureStuff.php
├── Providers/
│   └── CommandServiceProvider.php
├── Resources/              # API resources (View/Show pairs)
│   ├── MasterFeature/
│   ├── Version/
│   ├── InstalledFeature/
│   ├── RestrictionFeature/
│   └── FeatureStuff/
├── Schemas/                # Business logic layer
│   ├── MasterFeature.php
│   ├── Version.php
│   ├── InstalledFeature.php
│   ├── RestrictionFeature.php
│   └── FeatureStuff.php
├── Supports/
│   └── BaseLaravelFeature.php
├── LaravelFeature.php      # Main facade class
└── LaravelFeatureServiceProvider.php
```

## Key Classes

### Models

**MasterFeature** (`Models/MasterFeature.php`)
- Extends `FeatureStuff` (which extends Unicode)
- Uses the `unicodes` table
- Relationships: `version()`, `installedFeature()`, `installedFeatures()`

**Version** (`Models/Version.php`)
- Tracks feature versions with pricing
- Fields: `id`, `name`, `version`, `master_feature_id`, `price`, `props`
- Uses ULIDs as primary key

**InstalledFeature** (`Models/InstalledFeature.php`)
- Polymorphic relationship to any model (tenant, user, etc.)
- Tracks which features are installed for a model
- Fields: `model_type`, `model_id`, `master_feature_type`, `master_feature_id`, `version_id`, `batch`, `current`
- Uses `HasCurrent` trait for tracking current active version

**RestrictionFeature** (`Models/RestrictionFeature.php`)
- Polymorphic relationships for both `model` and `reference`
- Used to restrict features based on another model

### Schemas (Business Logic)

**MasterFeature Schema** (`Schemas/MasterFeature.php`)
```php
// Create/update a master feature
$schema = $this->schemaContract('MasterFeature');
$feature = $schema->prepareStoreMasterFeature($masterFeatureData);

// Query master features
$builder = $schema->masterFeature($conditionals);
```

**InstalledFeature Schema** (`Schemas/InstalledFeature.php`)
```php
// Install a feature for a model
$schema = $this->schemaContract('InstalledFeature');
$installed = $schema->prepareStoreInstalledFeature($installedFeatureData);
```

**Version Schema** (`Schemas/Version.php`)
```php
// Create/update a version
$schema = $this->schemaContract('Version');
$version = $schema->prepareStoreVersion($versionData);
```

### Data Transfer Objects

DTOs use Spatie Laravel Data with input/output mapping:

```php
use Hanafalah\LaravelFeature\Data\MasterFeatureData;

$data = MasterFeatureData::from([
    'name' => 'Premium Feature',
    'flag' => 'MasterFeature',  // Default if not set
    'price' => 0,                // Default if not set
    'version' => [
        'version' => '1.0.0',
        'price' => 100000
    ]
]);
```

### Traits

**HasRestrictionFeature** (`Concerns/HasRestrictionFeature.php`)
- Add to models that can have feature restrictions
- Provides global scope that filters restricted items
- Relationships: `asModelRestriction()`, `asReferenceRestriction()`

```php
use Hanafalah\LaravelFeature\Concerns\HasRestrictionFeature;

class Product extends Model
{
    use HasRestrictionFeature;

    public function usedRestrictionAs(): array
    {
        return ['model']; // or ['reference'] or both
    }
}
```

## Usage Patterns

### Installation

```bash
php artisan feature:install
```

This publishes:
- `config/laravel-feature.php` - Configuration file
- Database migrations
- Service provider
- Stubs

### Creating a New Feature

```bash
php artisan feature:make "Premium Dashboard"
```

Or programmatically:
```php
use Hanafalah\LaravelFeature\LaravelFeature;

LaravelFeature::useMasterFeature()->add('Premium Dashboard');
```

### Installing a Feature for a Model

```php
use Hanafalah\LaravelFeature\Data\InstalledFeatureData;

$data = InstalledFeatureData::from([
    'name' => 'Premium Dashboard',
    'model_type' => 'Tenant',
    'model_id' => $tenant->id,
    'master_feature_type' => MasterFeature::class,
    'master_feature_id' => $masterFeature->id,
    'version_id' => $version->id
]);

$this->schemaContract('InstalledFeature')->prepareStoreInstalledFeature($data);
```

### Restricting a Feature

```php
use Hanafalah\LaravelFeature\Data\RestrictionFeatureData;

$data = RestrictionFeatureData::from([
    'reference_type' => 'MasterFeature',
    'reference_id' => $featureId,
    'model_type' => 'Product',
    'model_id' => $productId
]);

$this->schemaContract('RestrictionFeature')->prepareStoreRestrictionFeature($data);
```

## Database Tables

### `unicodes` (MasterFeature/FeatureStuff)
Uses the shared `unicodes` table from `laravel-support` package.

### `versions`
| Column | Type | Description |
|--------|------|-------------|
| id | ULID | Primary key |
| name | string(255) | Version display name |
| version | string(50) | Semantic version (e.g., "1.0.0") |
| master_feature_id | FK | Reference to master feature |
| price | unsigned bigint | Price for this version |
| props | JSON | Additional properties |

### `installed_features`
| Column | Type | Description |
|--------|------|-------------|
| id | ULID | Primary key |
| parent_id | FK | Self-referencing for hierarchy |
| model_type | string(50) | Polymorphic model type |
| model_id | string(36) | Polymorphic model ID |
| master_feature_id | FK | Reference to master feature |
| version_id | FK | Reference to version |
| current | timestamp | Marks current active installation |
| batch | tinyint | Installation batch number |
| props | JSON | Additional properties |

### `restriction_features`
| Column | Type | Description |
|--------|------|-------------|
| id | ULID | Primary key |
| reference_type | string(50) | What is doing the restricting |
| reference_id | string(26) | Reference ID |
| model_type | string(50) | What is being restricted |
| model_id | string(26) | Model ID |
| props | JSON | Additional properties |

## Configuration

Published to `config/laravel-feature.php`:

```php
return [
    'namespace' => 'Hanafalah\\LaravelFeature',
    'commands' => [
        FeatureMakeCommand::class,
        InstallMakeCommand::class
    ],
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts',
        'schema' => 'Schemas',
        'database' => 'Database',
        'data' => 'Data',
        'resource' => 'Resources',
        'migration' => '../assets/database/migrations'
    ],
    'database' => [
        'models' => []  // Override model classes here
    ]
];
```

## Caching

Schemas implement caching for index operations:

```php
protected array $__cache = [
    'index' => [
        'name'     => 'installed_feature',
        'tags'     => ['installed_feature', 'installed_feature-index'],
        'duration' => 24 * 60  // 24 hours
    ]
];
```

## Integration with Wellmed

In the Wellmed multi-tenant system, this package is commonly used to:
- Define product features available for different tenant tiers
- Track which features each tenant has purchased/installed
- Manage feature versioning and upgrades
- Restrict certain functionalities based on subscription level
