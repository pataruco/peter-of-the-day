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
            $file->filename = $this->date.'_'.$fileNumber.'.'.$uploadedFile->clientExtension();
            $file->uploadToS3( $uploadedFile );
            // dump( $file->nameUrl);
        }
    }

    protected $fillable = ['date'];

}
