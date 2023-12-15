<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\VoteController;

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

Route::get('/', [BookController::class, 'index'])->name('books.filter');
Route::get('/authors', [VoteController::class, 'index'])->name('authors.top');

Route::get('/ratings/create', [VoteController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [BookController::class, 'storeRating'])->name('ratings.simpan');

Route::get('/get-books-by-author', [BookController::class, 'getBooksByAuthor']);
