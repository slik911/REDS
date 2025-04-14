<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use SoftDeletes, GeneratesUniqueIds;

    protected $fillable = [
        'client_id',
        'user_id',
        'rfq_id',
        'quote_number',
        'tax',
        'total',
        'status',
        'is_cancelled',
        'cancelled_reason',
        'sub_total',
        'deleted_at',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'uuid');
    }

    public function rfq()
    {
        return $this->belongsTo(RFQ::class, 'rfq_id', 'uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    public function service(){
        return $this->hasMany(Service::class, 'quote_id', 'uuid');
    }

    public function serviceList(){
        return $this->hasManyThrough(ServiceList::class, Service::class, 'service_list_id', 'uuid', 'uuid', 'uuid');
    }
}
