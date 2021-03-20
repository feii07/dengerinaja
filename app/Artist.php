<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $incrementing = false;

     public function song(){
         return $this->hasMany(Song::class);
     }
}
