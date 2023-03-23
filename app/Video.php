<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
