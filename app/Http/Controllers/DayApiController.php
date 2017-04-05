<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;
use Image;

class DayApiController extends Controller
{
    public function today( )
    {
        $today = Carbon::create()->toDateString();
        $day = Day::where('date', $today)->get()->first();
        if ( $day ) {
            $image = $day->images()[0];
            $file = Storage::disk('s3')->get( $image->setPath() );
            return Image::make( $file  )->response();
        } else {
            dump('no day');
        }
    }
}
