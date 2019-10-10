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
use App\Http\Middleware\foroAdmin;
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
Route::get('/foro', 'areaController@index')->name('foro');
Route::get('/foro/create', 'areaController@create');
Route::post('/foro', 'areaController@store')->middleware('auth','foroAdmin');
Route::get('/foro/area/{area}/edit', 'areaController@edit');
Route::put('/foro/area/{area}', 'areaController@update')->middleware('auth','foroAdmin');
Route::delete('/foro/{area}', 'areaController@destroy')->middleware('auth','foroAdmin');

// RESPONSES ROUTES

Route::post ('/foro/response', 'ResponseController@store');
Route::delete ('/foro/response/{response}', 'ResponseController@destroy');


Route::get ('/foro/tema/{response}/edit', 'ResponseController@edit');
Route::put ('/foro/response/{response}', 'ResponseController@update');

//FINDER ROUTES

Route::any('/foro/finder', 'areaController@search')->name('finder');

//FORO USER ROUTES

    //TODO: MIS HILOS o HILOS DE USUARIO Y COLABORA 
Route::get('/foro/user/{user}', 'themeController@foroUser');


// FORO ADMINISTRATION ROUTES
Route::get('/foro/admin', 'ForoPermissionController@index')->middleware('auth','foroAdmin');

Route::delete('/foro/admin/{user}/delete', 'ForoPermissionController@destroy');

Route::post('/foro/admin', 'ForoPermissionController@addModerator');