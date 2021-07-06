<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@selectPost');

Route::post('/insert-post', 'PostController@insertPost');

Route::get('/form', 'PostController@index');

Route::get('/edit/{id?}', 'PostController@editPost');

Route::post('/update-post/{id?}', 'PostController@updatePost');

Route::get('/delete/{id?}', 'PostController@deletePost');
