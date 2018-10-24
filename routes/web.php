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
Route::get('/', 'PublicController@index');

Route::get('/book', 'BookController@index');

//Route::resource('/books', 'BookController');

Route::get('/book/create', 'BookController@create');

Route::get('/book/{id}/edit', 'BookController@edit')->name('books.edit');
Route::get('/book/{id}/delete', 'BookController@destroy')->name('books.delete');


Route::post('/book/{id}/update', 'BookController@update');



Route::post('/book/store', 'BookController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/private', 'PrivateController@index');

Route::get('/private/show','PrivateController@show');

Route::get('book/{id}/show', 'BookController@show')->name('book.show');




Auth::routes();





