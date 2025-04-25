<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\GeneratesUniqueIds;
use Cloudinary\Api\Provisioning\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

    public function credential()
    {
        return $this->hasOne(Credential::class, 'user_id', 'uuid');
    }

    public function image()
    {
        return $this->hasOne(Upload::class, 'uuid', 'image_id');
    }

    public function user_role(){
        return $this->hasOne(UserRole::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->hasOneThrough(Role::class, UserRoles::class, 'user_id', 'id', 'id', 'role_id');
    }

}
