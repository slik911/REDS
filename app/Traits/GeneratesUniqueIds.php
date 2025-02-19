<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait GeneratesUniqueIds
{
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }



    protected static function bootGeneratesUniqueIds()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = $model->newUniqueId();
            }
        });
    }
}
