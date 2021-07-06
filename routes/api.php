<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//trak
Route::get('track', 'TrackController@index');

//playlist
Route::get('playlist', 'PlaylistController@index');
Route::post('playlist-store', 'PlaylistController@createPlaylist');
Route::get('playlist-delete/{id?}', 'PlaylistController@delete');
Route::put('playlist-update', 'PlaylistController@update');

Route::group([
    'prefix' => 'auth', 'middleware' => 'client_credentials'
], function () {
    Route::post('login', 'UserController@login')->name('login');
    Route::post('register', 'UserController@register');
    Route::group([
        'middleware' => 'cors'
    ], function () {
        Route::get('logout', 'UserController@logout');
        Route::get('user', 'UserController@user');
    });
});
