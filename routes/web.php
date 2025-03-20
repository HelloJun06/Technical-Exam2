<?php

use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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
    $authors = Author::all();
    return view('welcome', ['authors' => $authors]);
});
Route::get('/author', function () {
    $authors = Author::all();
    return view('welcome', ['authors' => $authors]);
});

Route::get('/book', function () {
    $books = Book::all();
    $authors = Author::all();
    return view('book', ['books' => $books] , ['authors' => $authors]);
});

Route::post('/add-author', [AuthorController::class, 'addAuthor']);

Route::delete('/delete-author/{author}', [AuthorController::class, 'deleteAuthor']);
Route::get('/edit-author/{author}', [AuthorController::class, 'displayEditAuthor']);
Route::put('/edit-author/{author}', [AuthorController::class, 'updateAuthor']);

//Book
Route::post('/add-book', [BookController::class, 'addBook']);
Route::delete('/delete-book/{book}', [BookController::class, 'deleteBook']);
Route::get('/edit-book/{book}', [BookController::class, 'displayEditBook']);
Route::put('/edit-book/{book}', [BookController::class, 'updateBook']);


// Route::get('/author/{author}', [AuthorController::class, 'displayAuthors']);
