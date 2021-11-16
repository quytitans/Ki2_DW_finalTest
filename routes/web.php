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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [\App\Http\Controllers\AdminController::class, 'getForm']);
Route::post('/furniture/create', [\App\Http\Controllers\AdminController::class, 'saveFurniture']);
Route::get('/all', [\App\Http\Controllers\AdminController::class, 'getAll']);
