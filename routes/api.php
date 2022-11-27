<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/tiket_konsers', [TiketController::class, 'index']);
//Route::get('/tiket_konsers/{id}', [TiketController::class, 'show']);
//Route::post('/tiket_konsers', [TiketController::class, 'store']);
//Route::put('/tiket_konsers/{id}', [TiketController::class, 'update']);
//Route::delete('/tiket_konsers/{id}', [TiketController::class, 'destroy']);

Route::resource('tiket_konsers', TiketController::class)->except(
    ['create', 'edit']
);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//get tiket konser
Route::get('/tiket_konsers', [TiketController::class, 'index']);
Route::get('/tiket_konsers/{id}', [TiketController::class, 'show']);

//get order tiket
Route::get('/order_tikets', [OrderController::class, 'index']);
Route::get('/order_tikets/{id}', [OrderController::class, 'show']);

//get transaksi
Route::get('/transaksis', [TransaksiController::class, 'index']);
Route::get('/transaksis/{id}', [TransaksiController::class, 'show']);

//crud tiket konser
Route::post('/tiket_konsers', [TiketController::class, 'store']);
Route::put('/tiket_konsers/{id}', [TiketController::class, 'update']);
Route::delete('/tiket_konsers/{id}', [TiketController::class, 'destroy']);

//crud order konser
Route::post('/order_tikets', [OrderController::class, 'store']);
Route::put('/order_tikets/{id}', [OrderController::class, 'update']);
Route::delete('/order_tikets/{id}', [OrderController::class, 'destroy']);

//crud transaksi
Route::post('/transaksis', [TransaksiController::class, 'store']);
Route::put('/transaksis/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksis/{id}', [TransaksiController::class, 'destroy']);

//protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('tiket_konsers', TiketController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('order_tikets', OrderController::class)->except('create', 'edit', 'show', 'index');
    Route::resource('transaksis', TransaksiController::class)->except('create', 'edit', 'show', 'index');
});