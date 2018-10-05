<?php

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

Route::get('/', 'TokenController@index' );
Route::get('/addForm', 'TokenController@addForm' );
Route::get('/editForm/{id}', 'TokenController@editForm' );
Route::post('/addToken', 'TokenController@store' );
Route::post('/editToken/{id}', 'TokenController@change' );
Route::get('/deleteToken/{id}', 'TokenController@destroy' );

