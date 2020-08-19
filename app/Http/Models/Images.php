<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Images extends Model
{
    use Notifiable,SoftDeletes;

    protected $fillable = [
        'filename','room_id'
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
