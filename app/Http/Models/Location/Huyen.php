<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Huyen extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = ['name', 'description', 'tinh_id'];

    public function tinh()
    {
        return $this->belongsTo('App\Models\Location\Tinh');
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
    public function setHuyenNameAttribute($value)
    {
        $this->attributes['huyen_name'] = ucfirst($value);
    }

    public function setHuyenDescriptionAttribute($value)
    {
        $this->attributes['huyen_description'] = ucfirst($value);
    }


    //******************************** SET************************************************************************************************************

    //******************************** GET************************************************************************************************************
    public function getHuyenNameAttribute($value)
    {
        return  $this->attributes['huyen_name'] = ucfirst($value);
    }

    public function getHuyenDescriptionAttribute($value)
    {
        return  $this->attributes['huyen_description'] = ucfirst($value);
    }

    //******************************** GET************************************************************************************************************

    //*********************************mutator************************************************************************************************************

    public function scopeOfId($query, $huyen)
    {
        return $query->whereId($huyen);
    }

    public function scopeOfTinhId($query, $tinh)
    {
        return $query->where('tinh_id', $tinh);
    }

    public function scopeOfAll($query, $huyen1, $huyen2)
    {
        $query = Huyen::query()
            ->join('tinhs', 'huyens.tinh_id', 'tinhs.id')
            ->whereLike('tinh_id',$huyen1)
            ->whereLike(['tinh_name','huyen_name'],$huyen2)
            ->select(['huyens.id','huyens.huyen_name','huyens.huyen_description','huyens.tinh_id','tinhs.tinh_name','tinhs.tinh_description'])
            ->paginate(6);
           
        return $query;
    }
}
