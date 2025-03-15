<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
    use SoftDeletes, GeneratesUniqueIds;

    protected $fillable = ['uuid', 'category_id', 'user_id', 'title', 'slug', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    public function uploads()
    {
        return $this->hasManyThrough(Upload::class, PostUpload::class, 'post_id', 'uuid', 'uuid', 'upload_id')->select('url');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'uuid');
    }

    public function rental(){
        return $this->hasOne(Rental::class, 'post_id', 'uuid');
    }

}
