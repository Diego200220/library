<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\RentBookController;
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
Route::resource('Libraries', LibraryController::class);
Route::resource('Book', BookController::class);
Route::resource('Classification', ClassificationController::class);
Route::resource('Clients', ClientController::class);
Route::resource('RentBook', RentBookController::class);
