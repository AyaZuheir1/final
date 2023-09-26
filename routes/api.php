<?php

use App\Http\Controllers\Api\V1\AccessTokensController;
use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\HallController;
use App\Http\Controllers\Api\V1\RequestController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
Route::middleware('guest:sanctum')->group(function(){

Route::post('auth/{guard}/access-token',[AccessTokensController::class,'store']);
});
Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/auth/access-token',[AccessTokensController::class,'index']);
    Route::delete('/auth/access-token/{id?}',[AccessTokensController::class,'destroy']);

    Route::get('/appointment/{hall}',AppointmentController::class);
    

    Route::apiResource('/hall',HallController::class);

});
Route::middleware('auth:sanctum,web')->group(function(){

    Route::post('user/{hall}/storeReq', [RequestController::class, 'store']);
    Route::put('user/{hall}/updateReq/{bookingRequest}/', [RequestController::class, 'update']);
    Route::delete('user/{hall}/deleteReq/{bookingRequest}/', [RequestController::class, 'delete']);
    
});
