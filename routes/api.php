<?php

use App\Http\Controllers\Menedzser;
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

    Route::middleware(['admin'])->group(function () {
        Route::get('/get', [UserController::class, 'showAll']);
        Route::post('/user/newp/{id}', [UserController::class, 'newPerm']);
    });

    Route::middleware(['manager'])->group(function () {
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
        //Létre hozzuk egy meg lévő cikkszámra készletett
        Route::post('/keszlet/new', [Menedzser::class, 'keszletN']);
        //Mindent tudunk modositani, cikkszám szerint
        Route::post('/keszlet/mod', [Menedzser::class, 'keszletM']);
        //Mindent tudunk modositani, cikkszám szerint
        Route::patch('/rendeles/{id}', [Menedzser::class, 'rendelesA']);
    });
});
