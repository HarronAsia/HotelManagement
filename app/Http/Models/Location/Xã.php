<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Xã extends Model
{
    use SoftDeletes,Notifiable;

    protected $fillable = ['name','description','tĩnh_id','huyện_id'];
}
