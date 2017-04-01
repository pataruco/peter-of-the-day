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
    // return redirect('days');
    return 'hello';
});

Route::get('/.well-known/acme-challenge/{id}', function () {
    return 'IrEhFxvlFr0wSTPZY1JU2tycAV57xQf1LGCdVU4YKE8.-_o3vlOqx_GCcuYToPwFwVvFEcy9G02IiqD0zgIl-Uo';
});



Auth::routes();

// Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Days
|--------------------------------------------------------------------------
*/
// Index
Route::get('/days', 'DayController@index')
    ->name('days.index')
    ->middleware('auth');
// Show

Route::get('/days/{id}', 'DayController@show')
    ->name('days.show')
    ->where('id', '[0-9]+')
    ->middleware('auth');
// Create
Route::get('/days/create', 'DayController@create')
    ->name('days.create')
    ->middleware('admin');
// Show
Route::post('/days', 'DayController@store')
    ->name('days.store')
    ->middleware('admin');

// Edit
Route::get('/days/{id}/edit', 'DayController@edit')
    ->name('days.edit')
    ->where('id', '[0-9]+')
    ->middleware('admin');

// Update
Route::put('/days/{id}', 'DayController@update')
    ->name('days.update')
    ->where('id', '[0-9]+')
    ->middleware('admin');

// destroy
Route::delete('/days/{id}', 'DayController@destroy')
    ->name('days.destroy')
    ->where('id', '[0-9]+')
    ->middleware('admin');

// index JSON
Route::get('/json/days', 'DayController@indexJson')
        ->name('days.indexJson');
/*
|--------------------------------------------------------------------------
| Files
|--------------------------------------------------------------------------
*/

Route::delete('/files/{id}', 'FileController@destroy')
    ->name('files.destroy')
    ->where('id', '[0-9]+')
    ->middleware('admin');
