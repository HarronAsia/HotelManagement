<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Hotel extends Model
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'hotel_name', 'hotel_description', 'hotel_type', 'hotel_address', 'hotel_latitude','hotel_longitude', 'hotel_image', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function room()
    {
        return $this->hasOne('App\Models\Room\Room');
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\Room\Room');
    }

    //*********************************mutator************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function setHotelNameAttribute($value)
    {
        $this->attributes['hotel_name'] = ucfirst($value);
    }

    public function setHotelDescriptionAttribute($value)
    {
        $this->attributes['hotel_description'] = ucfirst($value);
    }

    public function setHotelAddressAttribute($value)
    {
        $this->attributes['hotel_address'] = ucfirst($value);
    }

    //******************************** SET************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function getHotelNameAttribute($value)
    {
        return  $this->attributes['hotel_name'] = ucfirst($value);
    }

    public function getHotelDescriptionAttribute($value)
    {
        return  $this->attributes['hotel_description'] = ucfirst($value);
    }

    public function getHotelAddressAttribute($value)
    {
        return $this->attributes['hotel_address'] = ucfirst($value);
    }

    //******************************** SET************************************************************************************************************

    //*********************************mutator************************************************************************************************************

    public function scopeOfId($query, $hotel)
    {
        return $query->whereId($hotel);
    }

    public function scopeOfCategoryId($query,$hotel)
    {
        return $query->where('category_id', $hotel );
    }
}
