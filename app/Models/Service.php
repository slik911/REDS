<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    Use GeneratesUniqueIds;
    
    protected $fillable = [
        'service_list_id',
        'quote_id',
        'description',  
        'unit_price',
        'quantity',
        'total',
    ];

    public function servicelist(){
        return $this->belongsTo(ServiceList::class, 'service_list_id', 'uuid');
    }
}
