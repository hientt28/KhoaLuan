<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Appliance extends Model
{
    protected $fillable =[
    	'user_id',
    	'category_id',
    	'name',
    	'status',
    	'electric_value',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
