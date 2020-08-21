<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['comment_image', 'comment_detail', 'user_id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function like()
    {
        return $this->morphOne('App\Models\Like', 'likeable');
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

     //*********************************mutator************************************************************************************************************

     public function setComment_detailAttribute($value)
     {
         $this->attributes['comment_detail'] = ucfirst($value);
     }

     public function getComment_detailAttribute($value)
     {
         return $this->attributes['comment_detail'] = ucfirst($value);
     }
 
     //*********************************mutator************************************************************************************************************
     public function scopeOfRoom($query, $id)
     {
         return $query->whereCommentableId($id);
     }
 
     public function scopeOfId($query, $id)
     {
         return $query->whereId($id);
     }
}
