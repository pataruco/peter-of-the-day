<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;

class DayApiController extends Controller
{
    public function today( )
    {
        $today = Carbon::create()->toDateString();
        $day = Day::where('date', $today)->get()->first();
        if ( $day ) {
            $image = $day->images()[0];
            $file = Storage::disk('s3')->get( $image->setPath() );
            $headers = [
                 'Content-Type' => 'image',
                 'Content-Disposition' => 'attachment',
                 'filename'=>$image->filename
             ];
            return response()->file($file, $image->filename, $headers );
            // return response()->file($file, $image->filename, $headers );
            return view('api.show', $image);
        } else {
            dump('no day');
        }
    }
}


// public function respondDownload($fileContent, $fileName, $mime)
// {
//     $headers = [
//         'Content-Type' => $mime,
//         'Content-Disposition' => 'attachment',
//         'filename'=>$fileName
//     ];
//     return response()->download($fileContent, $fileName, $headers);
// }
