<?php

namespace App\Models\Room;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = [
        'room_name', 'room_floor', 'room_number', 'room_price', 'room_type',
        'room_status', 'room_condition', 'room_description', 'user_id', 'hotel_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function bed()
    {
        return $this->hasOne('App\Models\Room\Bed');
    }

    public function beds()
    {
        return $this->hasMany('App\Models\Room\Bed');
    }

    public function date()
    {
        return $this->morphOne('App\Models\Room\Booking_Date', 'bookable');
    }

    public function dates()
    {
        return $this->morphMany('App\Models\Room\Booking_Date', 'bookable');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Room\Like', 'likeable');
    }

    public function like()
    {
        return $this->morphOne('App\Models\Room\Like', 'likeable');
    }

    public function comment()
    {
        return $this->morphOne('App\Models\Room\Comment', 'commentable');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Room\Comment', 'commentable');
    }


    //*********************************mutator************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function setRoomNameAttribute($value)
    {
        $this->attributes['room_name'] = ucfirst($value);
    }

    public function setRoomTypeAttribute($value)
    {
        $this->attributes['room_type'] = ucfirst($value);
    }

    public function setRoomDescriptionAttribute($value)
    {
        $this->attributes['room_description'] = ucfirst($value);
    }

    //******************************** SET************************************************************************************************************

    //******************************** GET************************************************************************************************************
    public function getRoomNameAttribute($value)
    {
        return  $this->attributes['room_name'] = ucfirst($value);
    }

    public function getRoomTypeAttribute($value)
    {
        return  $this->attributes['room_type'] = ucfirst($value);
    }

    public function getRoomDescriptionAttribute($value)
    {
        return  $this->attributes['room_description'] = ucfirst($value);
    }
    //******************************** GET************************************************************************************************************

    //*********************************mutator************************************************************************************************************


    //*********************************Search************************************************************************************************************//
    public function scopeOfId($query, $room)
    {
        return $query->whereId($room);
    }

    public function scopeOfHotel($query, $room)
    {
        return $query->whereHotelId($room);
    }


    
    //*********************************Search************************************************************************************************************//
}
