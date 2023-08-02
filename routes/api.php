<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    StartupController, AuthController, InvestorController,
    FounderController, MailController
};

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

Route::prefix('v1')->group(function () {

    Route::get('mailtest',[MailController::class, 'mailTest']);

    Route::middleware('auth:sanctum')->get('/user',[AuthController::class,'getUser']);

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout',[AuthController::class, 'logout']);
        Route::post('register',[AuthController::class,'register']);
    });

    Route::middleware('auth:sanctum')->group(function () {
        
        Route::prefix('startup')->group(function () {
            Route::post('getFounderStartups',[StartupController::class, 'getFounderStartups']);
            Route::post('create',[StartupController::class, 'store']);
            Route::post('update',[StartupController::class, 'update']);
            Route::post('delete',[StartupController::class, 'delete']);
        });

        Route::prefix('investor')->group(function () {
            Route::post('create',[InvestorController::class, 'store']);
            Route::post('update',[InvestorController::class, 'update']);
            Route::post('delete',[InvestorController::class, 'delete']);
        });

        Route::prefix('founder')->group(function () {
            Route::post('create',[FounderController::class, 'store']);
            Route::post('update',[FounderController::class, 'update']);
            Route::post('delete',[FounderController::class, 'delete']);
        });
    
    });

    Route::prefix('startup')->group(function () {
        Route::get('/',[StartupController::class, 'index']);
        Route::get('{id}',[StartupController::class, 'getStartup']);
    });

    Route::prefix('investor')->group(function () {
        Route::get('/',[InvestorController::class, 'index']);
    });

    Route::prefix('founder')->group(function () {
        Route::get('/',[FounderController::class, 'index']);
    });

  
});
