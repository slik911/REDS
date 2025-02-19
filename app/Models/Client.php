<?php

namespace App\Models;

use App\Traits\GeneratesUniqueIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory, Notifiable, GeneratesUniqueIds, SoftDeletes;
    
        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
            'uuid',
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'address',
            'province',
            'city',
            'postal_code',
            'image_id',
            
        ];
    
        /**
         * The attributes that should be hidden for serialization.
         *
         * @var list<string>
         */
        protected $hidden = [
            // 'password',
            'remember_token',
        ];
    
        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                // 'password' => 'hashed',
            ];
        }
    
    
}
