<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RFQ extends Model
{
    use SoftDeletes, GeneratesUniqueIds;

    protected $fillable = [
        'uuid',
        'client_id',
        'RFQ_number',
        'title',
        'description',
        'province',
        'city',
        'postal_code',
        'status',
        'is_quotation_sent'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'uuid');
    }
}
