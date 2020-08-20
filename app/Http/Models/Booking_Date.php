<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Booking_Date extends Model
{
    use Notifiable,SoftDeletes;

    protected $fillable = ['checkin','checkout','time_begin','time_end','commentable_type','commentable_id','user_id'];

    public function bookable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
