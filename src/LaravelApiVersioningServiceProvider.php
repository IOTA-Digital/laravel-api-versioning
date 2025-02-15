<?php

namespace IotaDigital\LaravelApiVersioning;

use Illuminate\Support\ServiceProvider;

class LaravelApiVersioningServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishAssets();
        $this->configure();

        $baseFile = base_path(ApiVersioningHelper::getRouteFilePath() . '/index.php');
        if (ApiVersioningHelper::isEnabled() === true && file_exists($baseFile)) {
            $this->loadRoutesFrom($baseFile);
        }
    }

    public function register()
    {
    }

    protected function publishAssets(): void
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__ . '/../config/api-version.php' => config_path('api-version.php'),
        ], 'api-version-config');

        // Publish the routes folder
        $this->publishes([
            __DIR__ . '/../routes' => base_path('routes/versions'),
        ], 'api-version-routes');
    }

    protected function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/api-version.php', 'api-version'
        );
    }
}
