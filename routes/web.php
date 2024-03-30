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

Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::middleware(['session'])->group(function () {
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);
});
Route::get('/login/close', [App\Http\Controllers\LoginController::class, 'closeSession'])->name('closeSession');