<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Day;
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

    public function setPath ()
    {
        $path = App::environment().'/'.$this->filename;
        return $path;
    }

}
