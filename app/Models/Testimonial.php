<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes, GeneratesUniqueIds;
    protected $fillable = [
        'client_id',
        'message',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'uuid');
    }
}
