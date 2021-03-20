<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $incrementing = false;
    
    public function songs(){
        return $this->hasMany(Song::class);
    }

    public function subs(){
        return $this->hasMany(Subscription::class);
    }
}
