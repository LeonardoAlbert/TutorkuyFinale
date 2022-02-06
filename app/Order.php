<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'orderuser_id');
    }
}
