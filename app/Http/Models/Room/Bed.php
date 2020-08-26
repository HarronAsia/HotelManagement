<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Bed extends Model
{
    use SoftDeletes,Notifiable;

    protected $fillable = [
        'bed_name','bed_type','bed_image','room_id'
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room\Bed');
    }
    //*********************************mutator************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function setBedNameAttribute($value)
    {
        $this->attributes['bed_name'] = ucfirst($value);
    }

    public function setBedTypeAttribute($value)
    {
        $this->attributes['bed_type'] = ucfirst($value);
    }


    //******************************** SET************************************************************************************************************

    //******************************** GET************************************************************************************************************
    public function getBedNameAttribute($value)
    {
        return  $this->attributes['bed_name'] = ucfirst($value);
    }

    public function getBedTypeAttribute($value)
    {
        return  $this->attributes['bed_type'] = ucfirst($value);
    }

    //******************************** GET************************************************************************************************************

    //*********************************mutator************************************************************************************************************

    public function scopeOfId($query,$bed)
    {
        return $query->whereId($bed);
    }

    
    public function scopeOfBedType($query, $bed)
    {
        return $query->where('bed_type', 'LIKE', '%' . $bed . '%');
    }
}
