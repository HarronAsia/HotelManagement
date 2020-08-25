<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Xã extends Model
{
    use SoftDeletes,Notifiable;

    protected $fillable = ['name','description','tĩnh_id','huyện_id'];

    public function tinh()
    {
        return $this->belongsTo('App\Models\Location\Tĩnh');
    }

    public function huyen()
    {
        return $this->belongsTo('App\Models\Location\Huyện');
    }

    //*********************************mutator************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst($value);
    }


    //******************************** SET************************************************************************************************************

    //******************************** GET************************************************************************************************************
    public function getNameAttribute($value)
    {
        return  $this->attributes['name'] = ucfirst($value);
    }

    public function getDescriptionAttribute($value)
    {
        return  $this->attributes['description'] = ucfirst($value);
    }

    //******************************** GET************************************************************************************************************

    //*********************************mutator************************************************************************************************************

    public function scopeOfId($query, $huyen)
    {
        return $query->whereId($huyen);
    }

    public function scopeOfTinhId($query,$tinh)
    {
        return $query->where('tĩnh_id',$tinh);
    }

    public function scopeOfHuyenId($query,$huyen)
    {
        return $query->where('huyện_id',$huyen);
    }
}
