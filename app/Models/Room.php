<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;
use App\Models\User;

class Room extends Model
{
    protected $fillable =[
    	'user_id',
    	'name',
    ];

    public function schedules()
    {
    	return $this->hasMany(Schedule::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
