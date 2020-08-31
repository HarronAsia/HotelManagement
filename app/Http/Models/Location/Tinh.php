<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Tinh extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = ['name', 'description'];

    public function huyen()
    {
        return $this->hasOne('App\Models\Location\Huyen');
    }

    public function huyens()
    {
        return $this->hasMany('App\Models\Location\Huyen');
    }

    public function xa()
    {
        return $this->hasOne('App\Models\Location\Xa');
    }

    public function xas()
    {
        return $this->hasMany('App\Models\Location\Xa');
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

    public function scopeOfId($query, $tinh)
    {
        return $query->whereId($tinh);
    }

    public function scopeOfName($query, $tinh1 )
    {

        $query = Tinh::query()
            ->whereLike('tinh_name', $tinh1)
            ->paginate(6);
        
        return $query;
    }
}
