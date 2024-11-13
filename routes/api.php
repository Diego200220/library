<?php

use App\Http\Controllers\BookController;
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

Route::put('/Book/{id}', [BookController::class, 'update']);
Route::put('/Book/{id}', [BookController::class, 'update']);

Route::put('/RentBook/{id}', [BookController::class, 'update']);
Route::put('/RentBook/{id}', [BookController::class, 'update']);

Route::put('/Library/{id}', [BookController::class, 'update']);
Route::put('/Library/{id}', [BookController::class, 'update']);

Route::put('/Client/{id}', [BookController::class, 'update']);
Route::put('/Client/{id}', [BookController::class, 'update']);

Route::put('/Classification/{id}', [BookController::class, 'update']);
Route::put('/Classification/{id}', [BookController::class, 'update']);
