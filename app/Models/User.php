<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'avatar',
        'address',
        'phone',
        'role',
        'confirmed',
        'confirmation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function social_networks()
    {
        return $this->hasMany(SocialNetwork::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function isAdmin()
    {
        return $this->role == config('common.roles.admin');
    }
}
