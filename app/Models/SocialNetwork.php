<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class SocialNetwork extends Model
{
    protected $fillable =[
    	'user_id',
    	'provider',
    	'provider_user_id',
    	'avatar',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
