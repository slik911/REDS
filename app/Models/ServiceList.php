<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceList extends Model
{
    use SoftDeletes, GeneratesUniqueIds;
    
    protected $fillable = ['uuid', 'name', 'slug', 'status'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
