<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
