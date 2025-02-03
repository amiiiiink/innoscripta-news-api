<?php

namespace App\Exceptions;

use App\Helpers\ApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NewsServiceException extends Exception
{
    public function render(): JsonResponse
    {
        return ApiResponse::error(__('message.exception.connection_exception'), Response::HTTP_BAD_REQUEST);
    }
}
