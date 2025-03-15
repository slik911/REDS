<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'price',
        'meta_data',
        'post_id',
        'province',
        'city',
        'postal_code',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'uuid');
    }
}
