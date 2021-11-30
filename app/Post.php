<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'description', 'category_id','price'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function classschedules(){
        return $this->hasMany(ClassSchedule::class);
    }

    public function order(){
        return $this->hasOne(Order::class);
    }
    
}
