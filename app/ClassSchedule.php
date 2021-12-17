<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    // protected $casts = [
    //     'schedules' => 'datetime:Y-m-d H:i',
    // ];
    protected $dates = ['schedule'];
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
