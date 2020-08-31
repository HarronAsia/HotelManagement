<?php

namespace App\Models\Location;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Xa extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = ['name', 'description', 'huyen_id'];


    public function huyen()
    {
        return $this->belongsTo('App\Models\Location\Huyen');
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

    public function scopeOfHuyenId($query, $huyen)
    {
        return $query->where('huyen_id', $huyen);
    }

    public function scopeOfAll($query, $xa1, $xa2, $xa3)
    {
      
        $query = Xa::query()
            ->join('huyens', 'xas.huyen_id', 'huyens.id')
            ->join('tinhs', 'huyens.tinh_id', 'tinhs.id')
            ->whereLike('tinh_id', $xa1)
            ->whereLike('huyen_id', $xa2)
            ->whereLike(['tinh_name', 'huyen_name', 'xa_name'], $xa3)
            ->select(['xas.id', 'xas.xa_name', 'xas.xa_description', 'huyens.tinh_id', 'huyens.huyen_name', 'xas.huyen_id', 'tinhs.tinh_name'])
            ->paginate(6);

        return $query;
    }
}
