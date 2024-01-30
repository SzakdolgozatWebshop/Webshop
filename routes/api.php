<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use App\Models\User;
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
        Route::get('/users', [UserController::class, 'showAll']);
        Route::get('/user/{id}', [UserController::class, 'showOne']);
        Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser']);
        Route::patch('/user/permission/{id}', [UserController::class, 'newPerm']);
        Route::post('/user/update/{id}', [UserController::class, 'updateUser']);
        Route::post('/opcio/new', [UserController::class, 'newOpcio']);
        Route::post('/opcio/update/{id}', [UserController::class, 'updateOpcio']);
        Route::delete('/opcio/delete/{id}', [UserController::class, 'delOpcio']);
    });

    Route::middleware( ['manager'])->group(function () {
        
    });
});




