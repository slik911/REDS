<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Ramsey\Uuid\Uuid;
use App\Traits\GeneratesUniqueIds;

class Upload extends Model
{
    use SoftDeletes, GeneratesUniqueIds;
    protected $fillable = [
        'uuid',
        'url',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id'
    ];



    public static function store($url)
    {
        if(Upload::where('url', $url)->exists()) {
            return Upload::where('url', $url)->first();
        }
        return Upload::create(['url' => $url]);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_uploads', 'upload_id', 'post_id');
    }

    
}
