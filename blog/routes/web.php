<?php

Route::get('/', 'BlogController@index');

Route::get('/blog', 'BlogController@cpanel');

Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/post', 'BlogController@post');

Route::get('/blog/{text}', 'BlogController@blog');

Route::get('/blog/{text}/update', 'BlogController@update');
Route::put('/blog/{text}', 'BlogController@edit');

Route::get('/blog/{text}/delete', 'BlogController@delete');
Route::delete('/blog/{text}', 'BlogController@delete');



Route::get('/user', 'UserController@index');

Route::post('/user/vallog', 'UserController@vallog');
Route::get('/user/login', 'UserController@login');

Route::post('/user/valreg', 'UserController@valreg');
Route::get('/user/register', 'UserController@register');

Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/editval/{id}', 'UserController@editval');

Route::get('/user/upass/{id}', 'UserController@upass');
Route::post('/user/upassval/{id}', 'UserController@upassval');

Route::get('/user/delete/{id}', 'UserController@delete');

Route::get('/user/logout', 'UserController@logout');
