<?php

namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function showall();
    public function showallonRoom($room);
    public function showComment($comment);
    public function deletecomment($comment);
    public function restorecomment($comment);
}
