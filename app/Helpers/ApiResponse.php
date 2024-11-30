<?php

namespace App\Helpers;

use Throwable;

class ApiResponse
{
    public static function errorResponse(Throwable $th)
    {
        return response()->json([
            'status' => 500,
            'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
        ]);
    }
    public static function createSuccessResponse($redirect = null)
    {
        return response()->json([
            'status' => 200,
            'message' => config('constants.response.messages.created'),
            'redirect' => $redirect
        ]);
    }
}