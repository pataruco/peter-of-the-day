<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Day;
use Storage;
use App;
use Image;

class File extends Model
{
    public function day()
    {
        return $this->belongsTo('App\Day');
    }

    public function uploadToS3( $uploadedFile )
    {
        $typeOfMedia = $this->checkMedia( $uploadedFile );
        $this->setMediaType( $typeOfMedia );
        if ( $typeOfMedia === 'image') {
            $this->resizeImg( $uploadedFile );
        }
        Storage::disk('s3')
                ->put( $this->setPath(), file_get_contents( $uploadedFile->getRealPath() ), 'public' );
    }

    public function setPath()
    {
        $path = App::environment().'/'.$this->filename;
        return $path;
    }

    public function setFilename( Day $day,  $fileNumber, $uploadedFile )
    {
        return $this->filename = $day->date.'_'.$fileNumber.'.'.$uploadedFile->clientExtension();
    }

    public function setUrl()
    {
        $s3Bucket = 'https://peter-of-the-day.s3.amazonaws.com';
        $url =  $s3Bucket.'/'.$this->setPath();
        return $this->url = $url;
    }

    public function checkMedia( $uploadedFile )
    {
        $mime = $uploadedFile->getMimeType();
        $typeOfMedia = explode('/', $mime)[0];
        return $typeOfMedia;
    }

    public function setMediaType( $typeOfMedia )
    {
        return $this->media_type = $typeOfMedia;
    }

    public function resizeImg( $uploadedFile )
    {
        $img = Image::make( $uploadedFile );
        $width = $img->width();
        if ( $width > 1000 ) {
            $img->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save();
        }
    }

}
