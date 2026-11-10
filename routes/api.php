<?php

use App\Http\Controllers\Api\IngenieroController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IngenieroController::class, 'status'])->name('api.status');
Route::get('/ingenieros/buscar', [IngenieroController::class, 'buscar'])->name('api.ingenieros.buscar');
