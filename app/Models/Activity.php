<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'target_id',
        'target_class',
        'action_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
