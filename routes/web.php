<?php

Route::get('/', 'BlogsController@index')->name('home');

Auth::routes();
Route::get('/blogs', 'BlogsController@index')->name('blogs');
Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.store');
// keep trashed routes
Route::get('/blogs/trash', 'BlogsController@trash')->name('blogs.trash');
Route::get('/blogs/trash/{id}/restore', 'BlogsController@restore')->name('blogs.restore');
Route::delete('/blogs/trash/{id}/permanent-delete', 'BlogsController@permanentDelete')->name('blogs.permanent-delete');


Route::get('/blogs/{id}', 'BlogsController@show')->name('blogs.show');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('blogs.edit');
Route::patch('/blogs/{id}/update', 'BlogsController@update')->name('blogs.update');
Route::delete('/blogs/{id}/delete', 'BlogsController@delete')->name('blogs.delete');

// admin routes
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/blogs', 'AdminController@blogs')->name('admin.blogs');

// route resource
Route::resource('categories', 'CategoryController');