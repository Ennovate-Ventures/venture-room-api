<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StartupController;

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

Route::prefix('v1')->group(function () {

    Route::prefix('startup')->group(function () {
        Route::get('/',[StartupController::class, 'index']);
        Route::post('create',[StartupController::class, 'store']);
        Route::post('update',[StartupController::class, 'update']);
        Route::post('delete',[StartupController::class, 'delete']);
    });

    Route::prefix('investor')->group(function () {
        Route::get('/',[StartupController::class, 'index']);
        Route::post('create',[StartupController::class, 'store']);
        Route::post('update',[StartupController::class, 'update']);
        Route::post('delete',[StartupController::class, 'delete']);
    });

    Route::prefix('founder')->group(function () {
        Route::get('/',[StartupController::class, 'index']);
        Route::post('create',[StartupController::class, 'store']);
        Route::post('update',[StartupController::class, 'update']);
        Route::post('delete',[StartupController::class, 'delete']);
    });

  
});
