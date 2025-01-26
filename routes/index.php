<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use IotaDigital\LaravelApiVersioning\ApiVersioningHelper;
use IotaDigital\LaravelApiVersioning\Exceptions\UnsupportedVersion;

Route::prefix('api')->group(function () {
    $version = ApiVersioningHelper::getDefaultVersion();
    if (!app()->runningInConsole()) {
        $version = request()->header(ApiVersioningHelper::getHeader(), ApiVersioningHelper::getDefaultVersion());

        if (!in_array($version, ApiVersioningHelper::getSupportedVersions())) {
            throw new UnsupportedVersion;
        }
    }
    request()->attributes->set(ApiVersioningHelper::API_VERSION_ATTRIBUTE, $version);
    $routeFile = __DIR__ . DIRECTORY_SEPARATOR . $version . '.php';
    if (File::exists($routeFile)) {
        Route::group([], $routeFile);
    }
});
