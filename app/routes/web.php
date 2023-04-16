<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalculateController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/calculations', [App\Http\Controllers\CalculateController::class, 'index'])->name('calculations');
Route::get('/calculations/create', [App\Http\Controllers\CalculateController::class, 'showCreate'])->name('calculation_show_create');
Route::post('/calculations/insert', [App\Http\Controllers\CalculateController::class, 'insert'])->name('calculation_insert');
