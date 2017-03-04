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
// Index
Route::get('/days', 'DayController@index')
    ->name('days.index');
// Show
Route::get('/days/{id}', 'DayController@show')
    ->name('days.show')
    ->where('id', '[0-9]+');
// Create
Route::get('/days/create', 'DayController@create')
    ->name('days.create');
// Show
Route::post('/days', 'DayController@store')
    ->name('days.store');
