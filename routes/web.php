<?php

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

Route::get('/books/cheapest', 'BookController@cheapest');
Route::get('/books/longest', 'BookController@longest');
Route::get('/books/search', 'BookController@search');


Route::resource('books', 'Bookcontroller');
Route::post('/books/{id}/update', 'Bookcontroller@update');
Route::get('/books/{id}/delete', 'Bookcontroller@destroy');

Route::resource('loans', 'LoanController');

Route::resource('authors', 'AuthorController');

Route::get('language/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->action('Bookcontroller@index');
});


