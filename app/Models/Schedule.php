<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Appliance;
class Schedule extends Model
{
    protected $fillable =[
    	'room_id',
    	'appliance_id',
    	'name',
    	'status',
    	'value',
    ];

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

    public function appliance()
    {
    	return $this->belongsTo(Appliance::class);
    }
}
