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


//FORO AUTH ROUTES USERS

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

//FORO THEMES ROUTES

Route::get('/foro/temas', 'ThemeController@index');

Route::get('/foro/tema/{theme}', 'ThemeController@show')->name('theme.show');

Route::get('/foro/tema/{theme}/edit', 'ThemeController@edit');

Route::put('/foro/tema/{theme}', 'ThemeController@update');

Route::get('/foro/temas/crear', 'ThemeController@create');

Route::delete('/foro/tema/{theme}', 'ThemeController@destroy');

Route::post('/foro/temas', 'ThemeController@store');

//FORO AREAS ROUTES

Route::get('/foro/{area}/temas', 'areaController@show')->name('area.show');
Route::get('/foro', 'areaController@index');
Route::get('/foro/create', 'areaController@create');
Route::post('/foro', 'areaController@store');
Route::get('/foro/area/{area}/edit', 'areaController@edit');
Route::put('/foro/area/{area}', 'areaController@update');
Route::delete('/foro/{area}', 'areaController@destroy');

// RESPONSES ROUTES

Route::post ('/foro/response', 'ResponseController@store');
Route::delete ('/foro/response/{response}', 'ResponseController@destroy');


Route::get ('/foro/tema/{response}/edit', 'ResponseController@edit');
Route::put ('/foro/response/{response}', 'ResponseController@update');

//FINDER ROUTES

Route::any('/foro/finder', 'areaController@search')->name('finder');

//FORO USER ROUTES

    //TODO MIS HILOS o HILOS DE USUALIO 
Route::get('/foro/user/{user}', 'areaController@foroUser');