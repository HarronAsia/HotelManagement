<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use Notifiable;
    protected $fillable = [
        'username', 'number', 'dob', 'place', 'job', 'blood', 'relationship', 'bio', 'google_plus_link', 'yahoo_link', 'skype_link', 'facebook_link', 'twitter_link', 'instagram_link', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    //*********************************mutator************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function setUserNameAttribute($value)
    {
        $this->attributes['username'] = ucfirst($value);
    }

    public function setPlaceAttribute($value)
    {
        $this->attributes['place'] = ucfirst($value);
    }

    public function setJobAttribute($value)
    {
        $this->attributes['job'] = ucfirst($value);
    }

    public function setRelationshipAttribute($value)
    {
        $this->attributes['relationship'] = ucfirst($value);
    }

    public function setBioAttribute($value)
    {
        $this->attributes['bio'] = ucfirst($value);
    }
    //******************************** SET************************************************************************************************************

    //******************************** GET************************************************************************************************************
    public function getUserNameAttribute($value)
    {
        return  $this->attributes['username'] = ucfirst($value);
    }

    public function getPlaceAttribute($value)
    {
        return  $this->attributes['place'] = ucfirst($value);
    }

    public function getJobAttribute($value)
    {
        return  $this->attributes['job'] = ucfirst($value);
    }

    public function getRelationshipAttribute($value)
    {
        return $this->attributes['relationship'] = ucfirst($value);
    }

    public function getBioAttribute($value)
    {
        return $this->attributes['bio'] = ucfirst($value);
    }
    //******************************** GET************************************************************************************************************

    //*********************************mutator************************************************************************************************************
}
