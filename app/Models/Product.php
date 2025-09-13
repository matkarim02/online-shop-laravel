<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function userProduct()
    {
        return $this->hasMany(UserProduct::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
