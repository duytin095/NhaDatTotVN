<?php

use App\Http\Controllers\User\SePayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\WalletController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post     ('/wallet/recharge', [SePayController::class, 'handleSepayWebhook'])->name('wallet.recharge');
// Route::post     ('/check/recharge', [WalletController::class, 'recharge'])->name('wallet.recharge');
