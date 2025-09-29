<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfitDistributionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZakatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Account routes
    Route::apiResource('accounts', AccountController::class);
    Route::post('accounts/{id}/close', [AccountController::class, 'close']);

    // Audit Log routes (read-only)
    Route::apiResource('audit-logs', AuditLogController::class)->only(['index', 'show']);

    // Contract routes
    Route::apiResource('contracts', ContractController::class);
    Route::post('contracts/{id}/terminate', [ContractController::class, 'terminate']);

    // Fee routes
    Route::apiResource('fees', FeeController::class)->except(['destroy']);
    Route::delete('fees/{id}', [FeeController::class, 'remove']);

    // Payment routes
    Route::apiResource('payments', PaymentController::class)->except(['destroy']);
    Route::post('payments/{id}/cancel', [PaymentController::class, 'cancel']);

    // Profile routes (update only)
    Route::apiResource('profiles', ProfileController::class)->only(['update']);

    // Profit Distribution routes
    Route::get('profit-distributions', [ProfitDistributionController::class, 'index']);
    Route::post('profit-distributions/distribute', [ProfitDistributionController::class, 'distribute']);

    // User routes (API version)
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    // Zakat routes
    Route::apiResource('zakats', ZakatController::class);
    Route::post('zakats/calculate/{userId}', [ZakatController::class, 'calculate']);
});

Route::middleware('role.staff')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Account routes
    Route::apiResource('accounts', AccountController::class);
    Route::post('accounts/{id}/close', [AccountController::class, 'close']);

    // Audit Log routes (read-only)
    Route::apiResource('audit-logs', AuditLogController::class)->only(['index', 'show']);

    // Contract routes
    Route::apiResource('contracts', ContractController::class);
    Route::post('contracts/{id}/terminate', [ContractController::class, 'terminate']);

    // Fee routes
    Route::apiResource('fees', FeeController::class)->except(['destroy']);
    Route::delete('fees/{id}', [FeeController::class, 'remove']);

    // Payment routes
    Route::apiResource('payments', PaymentController::class)->except(['destroy']);
    Route::post('payments/{id}/cancel', [PaymentController::class, 'cancel']);

    // Profile routes (update only)
    Route::apiResource('profiles', ProfileController::class)->only(['update']);

    // Profit Distribution routes
    Route::get('profit-distributions', [ProfitDistributionController::class, 'index']);
    Route::post('profit-distributions/distribute', [ProfitDistributionController::class, 'distribute']);

    // User routes (API version)
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    // Zakat routes
    Route::apiResource('zakats', ZakatController::class);
    Route::post('zakats/calculate/{userId}', [ZakatController::class, 'calculate']);
});

Route::middleware('role.admin')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Account routes
    Route::apiResource('accounts', AccountController::class);
    Route::post('accounts/{id}/close', [AccountController::class, 'close']);

    // Audit Log routes (read-only)
    Route::apiResource('audit-logs', AuditLogController::class)->only(['index', 'show']);

    // Contract routes
    Route::apiResource('contracts', ContractController::class);
    Route::post('contracts/{id}/terminate', [ContractController::class, 'terminate']);

    // Fee routes
    Route::apiResource('fees', FeeController::class)->except(['destroy']);
    Route::delete('fees/{id}', [FeeController::class, 'remove']);

    // Payment routes
    Route::apiResource('payments', PaymentController::class)->except(['destroy']);
    Route::post('payments/{id}/cancel', [PaymentController::class, 'cancel']);

    // Profile routes (update only)
    Route::apiResource('profiles', ProfileController::class)->only(['update']);

    // Profit Distribution routes
    Route::get('profit-distributions', [ProfitDistributionController::class, 'index']);
    Route::post('profit-distributions/distribute', [ProfitDistributionController::class, 'distribute']);

    // User routes (API version)
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    // Zakat routes
    Route::apiResource('zakats', ZakatController::class);
    Route::post('zakats/calculate/{userId}', [ZakatController::class, 'calculate']);
});
