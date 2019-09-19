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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/foro/temas', 'ThemeController@index');

Route::get('/foro/tema/{theme}', 'ThemeController@show');


Route::get('/foro/temas/crear', 'ThemeController@create');

Route::delete('/foro/{theme}', 'ThemeController@destroy');

Route::post('/foro/temas', 'ThemeController@store');