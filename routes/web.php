<?php

Route::get('/', 'IndexController@index');

// Users
Route::post('/register', 'AuthController@register');
Route::post('/auth', 'AuthController@authenticate');
Route::get('/logout', 'AuthController@logout');

// Posts
Route::get('/posts', 'PostController@index');
Route::get('/posts/{year?}/{month?}', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::post('/post/add', 'PostController@store');
Route::get('/post/{post}', 'PostController@show');
Route::get('/post/{post}/edit', 'PostController@edit');
Route::get('/post/{post}/del', 'PostController@destroy');
Route::post('/post/{post}', 'PostController@update');

// Comments
Route::post('/comment/{commentable_type}/{commentable_id}', 'CommentController@store');
Route::get('/comment/{comment}', 'CommentController@show');
Route::get('/comment/{comment}/edit', 'CommentController@edit');
Route::patch('/comment/{comment}', 'CommentController@update');
Route::get('/comment/{comment}/delete', 'CommentController@destroy');

// Likes
Route::get('/like/{likable_type}/{likable_id}/{type}', 'LikeController@store');
Route::get('/like/{like}/delete', 'LikeController@destroy');
