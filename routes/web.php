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

Route::get('/foro', 'areaController@index');
Route::get('/foro/create', 'areaController@create');
Route::post('/foro', 'areaController@store');
Route::get('/foro/area/{area}/edit', 'areaController@edit');
Route::put('/foro/area/{area}', 'areaController@update');
Route::delete('/foro/{area}', 'areaController@destroy');
//Route::resource('foro', 'areaController');