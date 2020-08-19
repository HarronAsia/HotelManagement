<?php
namespace App\Repositories\Follower;

interface FollowerRepositoryInterface
{
    
    public function showfollowers($community);

    public function showfollowerCommunity($id,$community);
}