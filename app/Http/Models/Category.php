<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'title'
    ];

    public function hotel()
    {
        return $this->hasOne('App\Models\Hotel');
    }

    public function hotels()
    {
        return $this->hasMany('App\Models\Hotel');
    }

    //*********************************mutator************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    public function setBannerAttribute($value)
    {
        $this->attributes['banner'] = ucfirst($value);
    }

    //******************************** SET************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function getTitleAttribute($value)
    {
        return  $this->attributes['title'] = ucfirst($value);
    }

    public function getBannerAttribute($value)
    {
        return  $this->attributes['banner'] = ucfirst($value);
    }

    //******************************** SET************************************************************************************************************

    //*********************************mutator************************************************************************************************************

    public function scopeOfTitle($query,$category)
    {
        return $query->whereTitle($category);
    }
}
