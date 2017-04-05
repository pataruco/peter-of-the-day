<?php

use Illuminate\Http\Request;

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

// /api/day/today ->random today picture || no picture message
Route::get('/day/today', 'DayApiController@today');

// /api/day/{date}/ -> number of pictures || no picture message
Route::get('/day/{date}', 'DayApiController@date')->where('date', '[A-Z]+|\d{4}(?:-\d{1,2}){2}');

// /api/day/{date}/random -> picture url || no picture message
Route::get('/day/{date}/random', 'DayApiController@random')->where('date', '[A-Z]+|\d{4}(?:-\d{1,2}){2}');
// /api/day/{date}/{number} ->picture url || no picture message
Route::get('/day/{date}/{number}', 'DayApiController@dateNumber')->where('date', '[A-Z]+|\d{4}(?:-\d{1,2}){2}');
// /api/day/{date}/random/download -> picture download
Route::get('/day/{date}/random/download', 'DayApiController@randomDownload')->where('date', '[A-Z]+|\d{4}(?:-\d{1,2}){2}');
// /api/day/{date}/{number}/download ->picture
Route::get('/day/{date}/{number}', 'DayApiController@dateNumberDownload')->where('date', '[A-Z]+|\d{4}(?:-\d{1,2}){2}');
