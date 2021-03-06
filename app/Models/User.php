<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SocialNetwork;
use App\Models\Room;
use App\Models\Activity;
use App\Models\Appliance;

class User extends Authenticatable
{
    const ROLE_ADMIN = 1;
    const ROLE_USER = 0;
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

    public function appliances()
    {
        return $this->hasMany(Appliance::class);
    }

    public function isAdmin()
    {
        return $this->role;
    }
}
