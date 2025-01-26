<?php

use IotaDigital\LaravelApiVersioning\Enums\StandardVersion;
use IotaDigital\LaravelApiVersioning\Enums\VersioningMode;

return [
    'enabled' => true,

    'route_file_path' => 'routes/versions',

    'mode' => VersioningMode::header->name,
    'versions' => [
        StandardVersion::minimum->name => env('API_VERSIONS_MINIMUM', 'v1'),
        StandardVersion::latest->name => env('API_VERSIONS_LATEST', 'v1'),
        StandardVersion::stable->name => env('API_VERSIONS_STABLE', 'v1'),
        StandardVersion::default->name => env('API_VERSIONS_STABLE', 'v1'),
        StandardVersion::support->name => ['v1', 'v2'],
    ],

    'header' => 'api-version',
];
