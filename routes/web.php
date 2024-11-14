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

Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/classificaton/{id}', [ClassificationController::class, 'show'])->name('classification.show');
Route::get('/client/{id}', [ClientController::class, 'show'])->name('client.show');
Route::get('/library/{id}', [LibraryController::class, 'show'])->name('library.show');
Route::get('/RentBook/{id}', [RentBookController::class, 'show'])->name('rentbook.show');

Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::put('/classifications/{id}', [ClassificationController::class, 'update'])->name('classifications.update');
Route::delete('/classifications/{id}', [ClassificationController::class, 'destroy'])->name('classifications.destroy');

Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::put('/libraries/{id}', [LibraryController::class, 'update'])->name('libraries.update');
Route::delete('/libraries/{id}', [LibraryController::class, 'destroy'])->name('libraries.destroy');

Route::put('/rentbooks/{id}', [RentBookController::class, 'update'])->name('RentBook.update');
Route::delete('/rentbooks/{id}', [RentBookController::class, 'destroy'])->name('RentBook.destroy');
