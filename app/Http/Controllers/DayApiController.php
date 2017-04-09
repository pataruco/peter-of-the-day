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
        $image = $this->getImage($today);
        if ( $image ) {
            return $image->response();
        } else {
            return response()->json([
                'message' =>  'No image today',
            ]);
        }
    }

    public function date( $date ) {
        $day = $this->getDay( $date );
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
        $image = $this->getImage( $date, 0,  true);
        if ( $image ) {
            return $image->response();
        } else {
            return response()->json([
                'message' =>  'No image today',
            ]);
        }
    }

    public function dateNumber( $date, $number ){
        $image = $this->getImage( $date, $number,  false );
        if ( $image ) {
            return $image->response();
        } else {
           return response()->json([
                'message' =>  'No image',
            ]);
        }
    }

    public function randomDownload( $date ) {
        $image = $this->getImage( $date, 0,  true, true );
        if ( $image ) {
            return response( $image['file'], $image['response'], $image['headers'] );
        } else {
            return response()->json([
                  'message' =>  'No image today',
              ]);
        }
    }

    public function dateNumberDownload( $date, $number ) {
        $image = $this->getImage( $date, $number,  false, true );
        if ( $image ) {
            return response( $image['file'], $image['response'], $image['headers'] );
        } else {
            return response()->json([
                  'message' =>  'No image today',
              ]);
        }
    }

    public function getDay( $date ) {
        $day = Day::where('date', $date)->get()->first();
        if ( $day ) {
            return $day;
        } else {
            return false;
        }
    }


    public function getImage( $date, $number = false, $random = false, $download = false ) {
        $day = $this->getDay( $date );
        if ( $day ) {
            $max =  count( $day->images() );
            if ( $random ) {
                $number = random_int( 0 , $max - 1 );
            }
            if ( $number ) {
                if ( $number >= $max || $number <= -1 ) {
                    return false;
                } else {
                    $number = $number -1;
                }
            }
            $image = $day->images()[$number];
            $file = Storage::disk('s3')->get( $image->setPath() );
            if ( $download ) {
                $headers = [
                    'Content-Type' => 'image/png',
                    'Content-Description' => 'File Transfer',
                    'Content-Disposition' => "attachment; filename={$image->filename}",
                    'filename'=> $image->filename
                ];
                return array(
                    'file' => $file,
                    'response'=>200,
                    'headers' => $headers
                );
            }
            return Image::make( $file );
        } else {
            return false;
        }
    }
}
