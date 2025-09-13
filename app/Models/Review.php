<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'product_id',
        'author',
        'text',
        'rating',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
