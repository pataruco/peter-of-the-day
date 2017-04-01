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

Route::get('/day/today', 'DayApiController@today');



// /api/day/today ->random today picture || no picture message
// /api/day/{date}/ -> number of pictures || no picture message
// /api/day/{date}/random -> picture url || no picture message
// /api/day/{date}/{number} ->picture url || no picture message
// /api/day/{date}/random/download -> picture download
// /api/day/{date}/{number}/download ->picture
