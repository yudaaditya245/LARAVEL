<?php

Route::get('/', 'HomeController@index');

Route::get('/blog', 'HomeController@index');

Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/post', 'BlogController@post');

Route::get('/blog/{text}', 'BlogController@blog');

Route::get('/blog/{text}/update', 'BlogController@update');
Route::put('/blog/{text}', 'BlogController@edit');

Route::get('/blog/{text}/delete', 'BlogController@delete');
Route::delete('/blog/{text}', 'BlogController@delete');
