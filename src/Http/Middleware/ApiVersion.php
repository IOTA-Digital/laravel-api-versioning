<?php

namespace IotaDigital\LaravelApiVersioning\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use IotaDigital\LaravelApiVersioning\ApiVersioningHelper;
use IotaDigital\LaravelApiVersioning\Exceptions\UnsupportedVersion;

class ApiVersion
{
    /**
     * @throws \IotaDigital\LaravelApiVersioning\Exceptions\UnsupportedVersion
     */
    public function handle(Request $request, Closure $next)
    {
        $version = $request->header(ApiVersioningHelper::getHeader(), ApiVersioningHelper::getDefaultVersion());
        if (!in_array($version, ApiVersioningHelper::getSupportedVersions())) {
            throw new UnsupportedVersion;
        }

        $request->attributes->set(ApiVersioningHelper::API_VERSION_ATTRIBUTE, $version);

        return $next($request);
    }
}
