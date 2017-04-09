<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;
use Image;
use Response;

class DayApiController extends Controller
{
    public function today( )
    {
        $today = Carbon::create()->toDateString();
        $image = Day::getImage($today);
        if ( $image ) {
            return $image->response();
        } else {
            return response()->json([
                'message' =>  'No image today',
            ]);
        }
    }

    public function date( $date ) {
        $day = Day::getDay( $date );
        if ( $day ) {
            $count =  count( $day->images() );
            return response()->json([
                'date' =>  $day->date,
                'count' => $count
            ]);
        } else {
            return response()->json([
                'message' =>  'No images today',
            ]);
        }
    }

    public function random( $date ) {
        $image = Day::getImage( $date, 0,  true);
        if ( $image ) {
            return $image->response();
        } else {
            return response()->json([
                'message' =>  'No image today',
            ]);
        }
    }

    public function dateNumber( $date, $number ){
        $image = Day::getImage( $date, $number,  false );
        if ( $image ) {
            return $image->response();
        } else {
           return response()->json([
                'message' =>  'No image',
            ]);
        }
    }

    public function randomDownload( $date ) {
        $image = Day::getImage( $date, 0,  true, true );
        if ( $image ) {
            return response( $image['file'], $image['response'], $image['headers'] );
        } else {
            return response()->json([
                  'message' =>  'No image today',
              ]);
        }
    }

    public function dateNumberDownload( $date, $number ) {
        $image = Day::getImage( $date, $number,  false, true );
        if ( $image ) {
            return response( $image['file'], $image['response'], $image['headers'] );
        } else {
            return response()->json([
                  'message' =>  'No image today',
              ]);
        }
    }
}
