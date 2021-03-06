<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/tirage', [App\Http\Controllers\TirageController::class, 'index']);
Route::post('/tirage', [App\Http\Controllers\TirageController::class, 'index'])->name('tirage');

Route::get('/save', [App\Http\Controllers\TirageController::class, 'save'])->name('save');
Route::get('/gains/{year}/{number}', [App\Http\Controllers\TirageController::class, 'gains']);