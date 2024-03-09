<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Menedzser;
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
        Route::post('/opcio/new', [AdminController::class, 'newOpcio']);
        Route::post('/opcio/update/{id}', [AdminController::class, 'updateOpcio']);
        Route::delete('/opcio/delete/{id}', [AdminController::class, 'delOpcio']);
    });

    Route::middleware(['manager'])->group(function () {
        // a termékek meg jelenitése
        Route::get('/termek',[Menedzser::class , 'ShowTermek']);
        //egy uj cikk felvitele minden adat kell ami adatbázisban van 
        Route::post('/cikk/new', [Menedzser::class, 'newCikk']);
        //egy meg lévő cikknek az adatait modosithatjuk 
        Route::post('/cikk/mod', [Menedzser::class, 'modCikk']);
        //egy uj cikk felvitele minden adat kell ami adatbázisban van , URL még nemtudjuk hogy mukodik majd 
        Route::post('/cikkep/new', [Menedzser::class, 'cikkkepN']);
        // ULR és Cikkszám modositás lehet 
        Route::post('/cikkep/mod', [Menedzser::class, 'cikkkepM']);
        // Egy uj leirás létre hozzása egy meg létező cikkszámhoz
        Route::post('/cikleir/new', [Menedzser::class, 'cikkleirasN']);
        //Mindent tudunk modositani, cikkszám szerint
        Route::post('/cikleir/mod', [Menedzser::class, 'cikkleirasM']);
        //Egy uj kategoria létrehozzás
        Route::post('/cikkat/new', [Menedzser::class, 'cikkategoriN']);
        //Mindent tudunk modositani, cikkszám szerint
        Route::post('/cikkat/mod', [Menedzser::class, 'cikkategoriM']);
        //Mindent tudunk modositani, cikkszám szerint

        //Mindent tudunk modositani, cikkszám szerint
        Route::patch('/rendeles/{id}', [Menedzser::class, 'rendelesA']);
        //Mindent meg jelenitünk
        Route::get('/rendeleShow', [Menedzser::class, 'rendeleShow']);
        Route::get('/rendtetel/{rend_szam}', [Menedzser::class, 'rendelTetelfind']);

        
    });
});
Route::get('/termekShow',[Menedzser::class , 'ShowTermek']);
//menegerhez kell ado rakni 
Route::post('/keszlet/mod/{termekszam}', [Menedzser::class, 'TermekM']);
Route::get('/rendeleShow', [Menedzser::class, 'rendeleShow']);
Route::get('/rendtetel/{rend_szam}', [Menedzser::class, 'rendelTetelfind']);