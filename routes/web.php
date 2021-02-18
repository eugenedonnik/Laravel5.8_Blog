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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', "ThemeController@index");
//Route::post('/add-theme', 'ThemeController@addTheme')->name('home.themeadd');
Route::post('/', 'ThemeController@addTheme')->name('home.themeadd');
Route::delete('/{id}', 'ThemeController@delTheme');
Route::put('/', 'ThemeController@editTheme');

//Route::post('/contact', 'ThemeController@addTheme');

