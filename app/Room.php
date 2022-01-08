<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function tutor(){
        return $this->belongsTo(User::class);
    }

    public function student(){
        return $this->belongsTo(User::class);
    }
}
