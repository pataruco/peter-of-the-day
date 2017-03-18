<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;

class Day extends Model
{
    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function saveFiles( $requestAllFiles ) {
        $fileNumber = 0;
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

    protected $fillable = ['date'];

    protected $guarded = ['created_at', 'updated_at'];

    protected $visible = ['id', 'date'];

}
