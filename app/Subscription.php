<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function members(){
        return $this->belongsTo(Member::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class,'genre','id');
    }

}
