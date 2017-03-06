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

    protected $fillable = ['date'];

}
