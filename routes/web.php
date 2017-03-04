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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Days
|--------------------------------------------------------------------------
*/
Route::get('/days', 'DayController@index')->name('post.index');
Route::get('/days/{id}', 'DayController@show')->name('post.show')->where('id', '[0-9]+');
