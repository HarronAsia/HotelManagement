<?php

namespace App\Repositories\Comment;

use App\Repositories\BaseRepository;
use App\Models\Comment;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Comment::class;
    }

    public function showall()
    {
        return $this->model = Comment::withTrashed()->paginate(5);
    }

    public function showallonRoom($room)
    {
        return $this->model = Comment::withTrashed()->ofRoom($room)->get();
    }

    public function showComment($comment)
    {
        return $this->model = Comment::findOrFail($comment);
    }

    public function deletecomment($comment)
    {
        
        $this->model = Comment::findOrFail($comment);
        
        return $this->model->delete();
    }

    public function restorecomment($comment)
    {
       
        return $this->model = Comment::onlyTrashed()->ofId($comment)->restore();
                  
    }
   
}
