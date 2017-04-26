<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable =[
    	'user_id',
    	'name',
    ];


    public function appliances()
    {
        return $this->hasMany(Appliance::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
