<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
