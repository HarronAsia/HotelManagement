<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Booking_Date extends Model
{
    use Notifiable, SoftDeletes;

    //protected $fillable = ['checkin', 'checkout', 'time_begin', 'time_end', 'commentable_type', 'commentable_id', 'user_id'];
    protected $fillable = ['checkin', 'checkout', 'commentable_type', 'commentable_id', 'user_id'];
    public function bookable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function scopeOfBookable_Id($query, $date)
    {
        return $query->whereBookableId($date);
    }
    public function scopeOfUser_Id($query, $date)
    {
        return $query->whereUserId($date);
    }
}
