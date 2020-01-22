<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogs', 'BlogsController@index');
Route::get('/blogs/create', 'BlogsController@create');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.store');