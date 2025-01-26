<?php

namespace IotaDigital\LaravelApiVersioning;

use IotaDigital\LaravelApiVersioning\Enums\StandardVersion;

class ApiVersioningHelper
{
    public const API_VERSION_ATTRIBUTE = 'api_version';

    public static function getMinimumVersion(): string
    {
        return self::getConfigurations()['versions'][StandardVersion::minimum->name];
    }

    public static function getLatestVersion(): string
    {
        return self::getConfigurations()['versions'][StandardVersion::latest->name];
    }

    public static function getStableVersion(): string
    {
        return self::getConfigurations()['versions'][StandardVersion::stable->name];
    }

    public static function getDefaultVersion(): string
    {
        return self::getConfigurations()['versions'][StandardVersion::default->name];
    }

    public static function getSupportedVersions(): array
    {
        return self::getConfigurations()['versions'][StandardVersion::support->name];
    }

    public static function getHeader(): string
    {
        return self::getConfigurations()['header'];
    }

    public static function getRouteFilePath(): string
    {
        return self::getConfigurations()['route_file_path'];
    }



    public static function isEnabled(): bool
    {
        return self::getConfigurations()['enabled'];
    }

    public static function getConfigurations(): array
    {
        return config('api-version');
    }
}
