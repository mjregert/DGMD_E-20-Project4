<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PageController')->name('page.index');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users/create', 'UserController@store')->name('users.store');

Route::get('/passwords', 'PasswordController@index')->name('passwords.index');
Route::get('/passwords/create', 'PasswordController@create')->name('passwords.create');
Route::post('/passwords/create', 'PasswordController@store')->name('passwords.store');

Route::get('/lorem', 'LoremController@index')->name('lorem.index');
Route::get('/lorem/create', 'LoremController@create')->name('lorem.create');
Route::post('/lorem/create', 'LoremController@store')->name('lorem.store');
