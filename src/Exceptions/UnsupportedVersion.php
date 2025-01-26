<?php

namespace IotaDigital\LaravelApiVersioning\Exceptions;

use Illuminate\Http\JsonResponse;

class UnsupportedVersion extends \Exception
{
    protected $message; // Custom message
    protected int $statusCode; // HTTP status code

    public function __construct(string $message = 'Unsupported version', int $statusCode = 400)
    {
        parent::__construct($message, $statusCode);

        $this->message = $message;
        $this->statusCode = $statusCode;
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => [
                'message' => $this->message,
                'code' => $this->statusCode,
            ],
        ], $this->statusCode);
    }
}
