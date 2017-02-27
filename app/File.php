<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Day;

class File extends Model
{
    public function day()
    {
        return $this->belongsTo('App\Day');
    }

}
