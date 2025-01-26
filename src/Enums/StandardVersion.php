<?php

namespace IotaDigital\LaravelApiVersioning\Enums;

enum StandardVersion
{
    case stable;
    case minimum;
    case latest;
    case default;
    case support;
}
