<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Menedzser;
use Illuminate\Database\Capsule\Manager;
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

require __DIR__ . '/auth.php';
Route::post('/login', [Controller::class, 'login']);

Route::middleware('auth.basic')->group(function () {
    Route::get('/usera', [Controller::class, 'getUser']);
    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [AdminController::class, 'showAll']);
        Route::get('/user/{id}', [AdminController::class, 'showOne']);
        Route::delete('/user/delete/{id}', [AdminController::class, 'deleteUser']);
        Route::patch('/user/permission/{id}', [AdminController::class, 'newPerm']);
        Route::post('/user/update/{id}', [AdminController::class, 'updateUser']);
        Route::post('/newTerJell', [AdminController::class, 'newTerJell']);
        Route::get('showTul', [AdminController::class, 'showTulajdonsag']);
    });

    Route::middleware(['manager'])->group(function () {
        // a termékek meg jelenitése

        //Mindent meg jelenitünk 
        Route::post('/keszlet/mod/{termekszam}', [Menedzser::class, 'TermekM']);
        Route::get('/rendeleShow', [Menedzser::class, 'rendeleShow']);
        Route::get('/rendtabla/{rend_id}', [Menedzser::class, 'rendelesTabla']);
        Route::get('/rendtetel/{rend_szam}', [Menedzser::class, 'rendelTetelfind']);
        Route::get('/rendtablaleiras/{id}', [Menedzser::class, 'rTablaLiras']);
    });
});

//Mindent meg jelenitünk 
Route::post('/keszlet/mod/{termekszam}', [Menedzser::class, 'TermekM']);
Route::get('/rendeleShow', [Menedzser::class, 'rendeleShow']);
Route::get('/rendtabla/{rend_id}', [Menedzser::class, 'rendelesTabla']);
Route::get('/rendtetel/{rend_szam}', [Menedzser::class, 'rendelTetelfind']);
Route::get('/rendtablaleiras/{id}', [Menedzser::class, 'rTablaLiras']);
Route::post('/rendtablam/{rend_szam}/{termekId}', [Menedzser::class, 'rValtozas']);
Route::get('/termekShow', [Menedzser::class, 'ShowTermek']);
Route::post('/newTermek', [Menedzser::class, 'newTermek']);

//menegerhez kell oda rakni 