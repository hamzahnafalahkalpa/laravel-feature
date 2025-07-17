<?php

namespace Hanafalah\LaravelFeature\Commands;

class InstallMakeCommand extends EnvironmentCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feature:install';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command ini digunakan untuk installing awal laravel feature';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $provider = 'Hanafalah\LaravelFeature\LaravelFeatureServiceProvider';

        $this->comment('Installing Feature...');
        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'config'
        ]);
        $this->info('✔️  Created config/laravel-feature.php');

        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'stubs'
        ]);
        $this->info('✔️  Created Stubs/LaravelFeatureStubs');

        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'providers'
        ]);

        $this->info('✔️  Created LaravelFeatureServiceProvider.php');

        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'migrations'
        ]);

        $this->info('✔️  Created migrations');

        $this->comment('hanafalah/laravel-feature installed successfully.');
    }
}
