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

Route::middleware('v1')->group(function () {

    Route::middleware('startups')->group(function () {
        Route::get('/',[StartupController::class, 'index']);
        Route::get('create',[StartupController::class, 'store']);
        Route::get('update',[StartupController::class, 'update']);
        Route::get('delete',[StartupController::class, 'delete']);
    });

    Route::middleware('investor')->group(function () {
        Route::get('/',[StartupController::class, 'index']);
        Route::get('create',[StartupController::class, 'store']);
        Route::get('update',[StartupController::class, 'update']);
        Route::get('delete',[StartupController::class, 'delete']);
    });

    Route::middleware('founder')->group(function () {
        Route::get('/',[StartupController::class, 'index']);
        Route::get('create',[StartupController::class, 'store']);
        Route::get('update',[StartupController::class, 'update']);
        Route::get('delete',[StartupController::class, 'delete']);
    });

  
});
