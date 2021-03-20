<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

     public function song(){
         return $this->belongsTo(Song::class);
     }

}
