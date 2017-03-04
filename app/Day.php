<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\File;

class Day extends Model
{
    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function saveFiles( $files ) {
        foreach ( $files['files'] as  $file ) {
            dump($file);
        }
    }

    protected $fillable = ['date'];

}
