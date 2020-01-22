<?php

Route::get('/', 'BlogsController@index')->name('home');

Auth::routes();
Route::get('/blogs', 'BlogsController@index');
Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.store');
Route::get('/blogs/{id}', 'BlogsController@show')->name('blogs.show');