<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\TypeController;

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
    return view('layouts.master');
});

Route::get('/pet', [PetController::class, 'index']);
Route::post('/pet/search', [PetController::class, 'search']);
Route::get('/pet/edit/{id?}', [PetController::class, 'edit']);
Route::post('/pet/update', [PetController::class, 'update']);
Route::post('/pet/edit', [PetController::class, 'insert']);
Route::get('/pet/remove/{id}',[PetController::class, 'remove']);

Route::get('/type', [TypeController::class, 'index']);
Route::post('/type/search', [TypeController::class, 'search']);
Route::get('/type/edit/{id?}', [TypeController::class, 'edit']);
Route::post('/type/update', [TypeController::class, 'update']);
Route::post('/type/edit', [TypeController::class, 'insert']);
Route::get('/type/remove/{id}',[TypeController::class, 'remove']);