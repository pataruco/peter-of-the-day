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

    public function date( $date ) {
        $day = Day::where('date', $date)->get()->first();
        if ( $day ) {
            $count =  count( $day->images() );
            return response()->json([
                'date' =>  $day->date,
                'count' => $count
            ]);
        } else {
            dump('no day');
        }
    }

    public function random( $date ) {
        $day = Day::where('date', $date)->get()->first();
        if ( $day ) {
            $max =  count( $day->images() );
            $random = random_int( $min , $max );
            $image = $day->images()[$random];
            $file = Storage::disk('s3')->get( $image->setPath() );
            return Image::make( $file  )->response();
        } else {
            dump('no day');
        }
    }

    public function dateNumber( $date, $number ){
        $day = Day::where('date', $date)->get()->first();
        if ( $day ) {
            $max =  count( $day->images() );
            $image = $day->images()[$number];
            $file = Storage::disk('s3')->get( $image->setPath() );
            return Image::make( $file  )->response();
        } else {
            dump('no day');
        }
    }

    public function randomDownload( ) {
        $day = Day::where('date', $date)->get()->first();
        if ( $day ) {
            $max =  count( $day->images() );
            $random = random_int( $min , $max );
            $image = $day->images()[$random];
            // $file = Storage::disk('s3')->get( $image->setPath() );
            return response()->download( $image->setPath() );
        } else {
            dump('no day');
        }
    }
}
