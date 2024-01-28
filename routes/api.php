<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth.basic')->group(function () {

    Route::middleware( ['admin'])->group(function () {
        Route::get('/get', [UserController::class, 'showAll']);
        Route::post('/user/newp/{id}', [UserController::class, 'newPerm']);
    });

    Route::middleware( ['manager'])->group(function () {
        
    });
});




