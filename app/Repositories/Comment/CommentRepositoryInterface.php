<?php

namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function showall();
    public function showallonPost($id);

    public function showComment($id);

    public function deletecomment($id);
    public function restorecomment($id);
}
