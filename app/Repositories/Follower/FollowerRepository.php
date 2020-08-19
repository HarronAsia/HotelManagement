<?php

namespace App\Repositories\Follower;

use App\Models\Follower;
use App\Repositories\BaseRepository;

use App\Models\Community;


class FollowerRepository extends BaseRepository implements FollowerRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Follower::class;
    }

    public function showfollowers($community)
    {
         $community = Community::findOrFail($community); 
        
         return $this->model =  $community->followers();
               
    }
    public function showfollowerCommunity($id,$community)
    {          
        return $this->model =  Follower::ofFollowerId($id)->ofFollowingId($community)->first();
    }

}
