<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Day extends Model
{
    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function saveFiles( $files ) {
        foreach ( $files['files'] as  $file ) {
            $file = File::create()
            
        }
    }

    protected $fillable = ['date'];

}
