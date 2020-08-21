<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Follower extends Model
{
    use Notifiable,SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeOfFollowerId($query, $id)
    {
        return $query->where('follower_id', $id);
    }
    public function scopeOfFollowingId($query, $id)
    {
        return $query->where('following_id', $id);
    }

}
