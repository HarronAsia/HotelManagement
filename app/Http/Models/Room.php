<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = [
        'room_name', 'room_floor', 'room_number', 'room_price', 'room_type',
        'room_status', 'room_condition', 'room_description', 'user_id', 'hotel_id',
        'date_start', 'time_start', 'date_end', 'time_end',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function bed()
    {
        return $this->hasOne('App\Models\Bed');
    }

    public function beds()
    {
        return $this->hasMany('App\Models\Bed');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Images');
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

    public function scopeOfAll($query, $room1, $room2, $room3, $room4, $room5, $room6, $room7)
    {

        $query = Room::query()
        ->join('beds', 'rooms.id', '=', 'beds.room_id')
        ->whereLike('date_start',$room1)
        ->whereLike('date_end',$room2)
        ->whereLike('time_start',$room3)
        ->whereLike('time_end',$room4)
        ->whereLike('room_type',$room5)
        ->whereLike('bed_type',$room6)
        ->whereLike('room_condition',$room7);
        
        return $query;
    }
    //*********************************Search************************************************************************************************************//
}
