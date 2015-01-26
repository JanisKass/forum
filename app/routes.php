<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




// protect against CSRF all POST requests
 Route::when('*', 'csrf', array('post'));

Route::controller('threads', 'ThreadController');
Route::controller('user', 'UserController');
Route::controller('admin', 'AdminController');
Route::controller('category', 'CategoryController');

Route::get('/', 'ThreadController@getIndex');