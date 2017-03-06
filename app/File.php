<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Day;
use Storage;
use App;

class File extends Model
{
    public function day()
    {
        return $this->belongsTo('App\Day');
    }

    public function uploadToS3( $uploadedFile )
    {
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

}


// https://peter-of-the-day.s3.amazonaws.com/local/2017-03-07_2.png
