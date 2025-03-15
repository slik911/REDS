<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\GeneratesUniqueIds;

class Category extends Model
{
    use SoftDeletes, GeneratesUniqueIds;
    
    protected $fillable = ['uuid', 'name', 'slug', 'status'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'uuid');
    }
}
