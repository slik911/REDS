<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceList extends Model
{
    use SoftDeletes, GeneratesUniqueIds;
    
    protected $fillable = ['uuid', 'name', 'slug','description', 'image_id', 'status'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function image()
    {
        return $this->hasOne(Upload::class, 'uuid', 'image_id');
    }
}
