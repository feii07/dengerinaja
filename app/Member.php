<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     public $incrementing = false;

     public function subscription(){
         return $this->belongsTo(Subscription::class);
     }
}
