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

    public static function deleteSuccessResponse()
    {
        return response()->json([
            'status' => 200,
            'message' => config('constants.response.messages.deleted'),
        ]);
    }
    public static function updateSuccessResponse()
    {
        return response()->json([
            'status' => 200,
            'message' => config('constants.response.messages.updated'),
        ]);
    }
    public static function balanceNotEnoughResponse($redirect = null)
    {
        return response()->json([
            'status' => 500,
            'type' => 'balance_not_enough',
            'message' => config('constants.response.messages.balance_not_enough'),
            'redirect' => $redirect,
        ]);
    }
    public static function walletNotVerifiedResponse($redirect = null){
        return response()->json([
            'status' => 500,
            'type' => 'unverified',
            'message' => config('constants.response.messages.unverified'),
            'redirect' => $redirect,
        ]);
    }
}