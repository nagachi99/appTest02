<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\BooksController;

const CONTACT_PATH = App\Http\Controllers\ContactsController::class;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/',                  [BooksController::class, 'index']);
    Route::get('/books',             [BooksController::class, 'create']);
    Route::post('/books',            [BooksController::class, 'store']);
    Route::get('/books/{book}/show', [BooksController::class, 'show']);
    Route::get('/books/{book}/edit', [BooksController::class, 'edit']);
    Route::put('/books/{book}',      [BooksController::class, 'update']);
    Route::delete('/books/{book}',   [BooksController::class, 'destroy']);
});

Route::resource('items', 'ItemsController');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get( '/contact',         [CONTACT_PATH, 'show']    )->name('contact.show');
Route::post('/contact',         [CONTACT_PATH, 'post']    )->name('contact.post');
Route::get( '/contact/confirm', [CONTACT_PATH, 'confirm'] )->name('contact.confirm');
Route::post('/contact/confirm', [CONTACT_PATH, 'send']    )->name('contact.send');
Route::get( '/contact/done',    [CONTACT_PATH, 'done']    )->name('contact.done');
