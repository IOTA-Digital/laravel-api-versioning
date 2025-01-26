<?php

namespace IotaDigital\LaravelApiVersioning\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VersionNotFound extends NotFoundHttpException
{
    public function __construct(string $message = 'API version not found', ?\Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct($message, $previous, $code, $headers);
    }
}
