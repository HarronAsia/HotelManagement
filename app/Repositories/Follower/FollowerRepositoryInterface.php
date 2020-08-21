<?php
namespace App\Repositories\Follower;

interface FollowerRepositoryInterface
{
    
    public function showfollowers($room);

    public function showfollowerRoom($id,$room);
}