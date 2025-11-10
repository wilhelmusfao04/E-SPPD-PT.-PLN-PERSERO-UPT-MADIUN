<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiSppdController;
use App\Http\Controllers\Api\ApiSesiController;

Route::get('/sppds', [ApiSppdController::class, 'index']);
Route::post('/sppds', [ApiSppdController::class, 'store']);
Route::get('/sppds/{id}', [ApiSppdController::class, 'show']);
Route::put('/sppds/{id}', [ApiSppdController::class, 'update']);
Route::delete('/sppds/{id}', [ApiSppdController::class, 'destroy']);

// route tambahan (opsional) kalau mau hitung status
Route::get('/sppds-status', [ApiSppdController::class, 'statusCount']);

Route::post('/login', [ApiSesiController::class, 'login']);
Route::get('/me', [ApiSesiController::class, 'me']);
Route::post('/logout', [ApiSesiController::class, 'logout']);