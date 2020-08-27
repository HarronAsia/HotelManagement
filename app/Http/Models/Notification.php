<?php

namespace App\Models;

use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    use Notifiable;

    protected $fillable = ['data', 'user_id'];

    public function users()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function scopeReadAt($query)
    {
        return $query->whereReadAt(NULL);
    }

    public function scopeOfUserId($query,$id)
    {
        return $query->whereUserId($id);
    }

    public function scopeCreatedAt($query)
     {
         return $query->orderBy('created_at','desc');
     }
     public function scopeOfId($query,$id)
     {
         return $query->whereId($id);
     }
     public function scopeOfNotifiableId($query,$id)
     {
         return $query->whereNotifiableId($id);
     }
}
