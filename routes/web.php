<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Ejemplo;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\RentBookController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ClassificationController;

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


/* Route get siempre va a decirnos que iniciara en una pagina.*/
Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('Classification');
Route::resource('Classification', ClassificationController::class);
Route::resource('Book', BookController::class);
Route::resource('Libraries', LibraryController::class);
Route::resource('Clients', ClientController::class);
Route::resource('RentBook', RentBookController::class);
Route::get('/books/{id}', [BookController::class, 'update'])->name('books.update');



