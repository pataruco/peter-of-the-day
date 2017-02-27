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
}
