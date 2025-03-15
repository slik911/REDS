<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostUpload extends Model
{
    protected $fillable = ['post_id', 'upload_id'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'uuid');
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'upload_id', 'uuid');
    }
}
