<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PembayaranController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kamar', [KamarController::class, 'index']);
Route::get('kamar/{id}', [KamarController::class, 'show']);

Route::get('reservasi', [ReservasiController::class, 'index']);
Route::get('reservasi/{id}', [ReservasiController::class, 'show']);

Route::get('pembayaran', [PembayaranController::class, 'index']);
Route::get('pembayaran/{id}', [PembayaranController::class, 'show']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('kamar', KamarController::class)->except(['create', 'edit', 'show', 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('reservasi', ReservasiController::class)->except(['create', 'edit', 'show', 'index']);
    Route::resource('pembayaran', PembayaranController::class)->except(['create', 'edit', 'show', 'index']);
});

