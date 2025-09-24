<?php

use Hanafalah\LaravelFeature\Models as FeatureModels;
use Hanafalah\LaravelFeature\Commands as FeatureCommands;

return [
    'namespace' => 'Hanafalah\\LaravelFeature',
    'commands' => [
        FeatureCommands\FeatureMakeCommand::class,
        FeatureCommands\InstallMakeCommand::class
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
        'models' => [
        ]
    ]
];
