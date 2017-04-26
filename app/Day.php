<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
use Storage;
use Image;

class Day extends Model
{
    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function saveFiles( $requestAllFiles, $fileNumber = 0 ) {
        foreach ( $requestAllFiles['files'] as $uploadedFile  ) {
            $fileNumber++;
            $file = File::create();
            $file->setFilename( $this,  $fileNumber, $uploadedFile);
            $file->uploadToS3( $uploadedFile );
            $file->setUrl();
            $this->files()->save( $file );
        }
    }

    public function getFilesByMedia( $media )
    {
        $files = $this->files;
        $array = array_map( function( $file ) use ( $media ){
            if ( $file->media_type === $media ) {
                return $file;
            }
        }, end($files) );

        $mediaCollection = array_filter( $array, function( $var ){
               return !is_null( $var );
           });
        return $mediaCollection;
    }

    public function videos()
    {
        $videos = $this->getFilesByMedia('video');
        return $videos;
    }

    public function images()
    {
        $images = $this->getFilesByMedia('image');
        return $images;
    }

    public static function getDay( $date ) {
        $day = Day::where('date', $date)->get()->first();
        if ( $day ) {
            return $day;
        } else {
            return false;
        }
    }

    public static function getImage( $date, $number = false, $random = false, $download = false ) {
        $day = Day::getDay( $date );
        if ( $day ) {
            $max =  count( $day->images() );
            if ( $random ) {
                $number = random_int( 0 , $max - 1 );
            }
            if ( $number ) {
                if ( $number > $max || $number <= 0 ) {
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

    protected $fillable = ['date'];

    protected $guarded = ['created_at', 'updated_at'];

    protected $visible = ['id', 'date'];

}
