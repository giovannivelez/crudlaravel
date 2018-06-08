<?php
Route::get('/', 'LibroController@index');

Route::resource('libro', 'LibroController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
