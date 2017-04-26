<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    protected $fillable =[
    	'user_id',
    	'category_id',
    	'name',
    	'status',
    	'electric_value',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
