<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
    protected $fillable = [
      'name',
      'email',
      'password'
    ];

    public function userProducts()
    {
        return $this->hasMany(UserProduct::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, UserProduct::class, 'user_id', 'id', 'id', 'product_id');
    }
}
