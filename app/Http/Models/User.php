<?php

namespace App\Models;
use App\Models\Room;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function following()
    {
        return $this->belongsToMany(Room::class, 'followers', 'follower_id', 'following_id')->withTimestamps();
    }

    public function date()
    {
        return $this->hasOne('App\Models\Booking_Date');
    }

    public function dates()
    {
        return $this->hasMany('App\Models\Booking_Date');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //*********************************mutator************************************************************************************************************

    //******************************** SET************************************************************************************************************
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = ucfirst($value);
    }

    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = ucfirst($value);
    }

    //******************************** SET************************************************************************************************************

    //******************************** GET************************************************************************************************************
    public function getNameAttribute($value)
    {
        return  $this->attributes['name'] = ucfirst($value);
    }

    public function getEmailAttribute($value)
    {
        return  $this->attributes['email'] = ucfirst($value);
    }

    public function getRoleAttribute($value)
    {
        return  $this->attributes['role'] = ucfirst($value);
    }
    //******************************** GET************************************************************************************************************

    //*********************************mutator************************************************************************************************************

    public function scopeOfName($query, $user)
    {
        return $query->whereName($user);
    }

    public function scopeOfId($query, $user)
    {
        return $query->whereId($user);
    }

    public function scopeAdmin($query)
    {
        return $query->whereRole('admin');
    }

    
}
