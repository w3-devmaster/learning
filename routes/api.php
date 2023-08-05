<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('test',function() {
    $data = [
        'message' => 'TEST 1 OK',
    ];

    return response()->json($data);
});

Route::post('auth',[AuthController::class,'authenticate']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('test2',function() {
        $data = [
            'message' => 'TEST 2 OK',
        ];

        return response()->json($data);
    });

    Route::apiResource('post',PostController::class);

    Route::get('user',[AuthController::class,'user']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('logout-all',[AuthController::class,'logout_all']);
});


