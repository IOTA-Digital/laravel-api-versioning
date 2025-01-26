<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use IotaDigital\LaravelApiVersioning\ApiVersioningHelper;
use IotaDigital\LaravelApiVersioning\Http\Middleware\ApiVersion;

Route::prefix('api')->middleware(ApiVersion::class)->group(function () {
    $version = request()->attributes->get(
        ApiVersioningHelper::API_VERSION_ATTRIBUTE,
        ApiVersioningHelper::getDefaultVersion()
    );
    $directory = __DIR__ . DIRECTORY_SEPARATOR . $version;
    if (File::isDirectory($directory)) {
        foreach (glob($directory . '/*.php') as $routeFile) {
            require $routeFile;
        }
    }
});
