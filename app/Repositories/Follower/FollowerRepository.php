<?php

namespace App\Repositories\Follower;

use App\Models\Room\Follower;
use App\Repositories\BaseRepository;

use App\Models\Room\Room;


class FollowerRepository extends BaseRepository implements FollowerRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Room\Follower::class;
    }

    public function showfollowers($room)
    {
         $room = Room::findOrFail($room); 
        
         return $this->model =  $room->followers();
               
    }
    public function showfollowerRoom($id,$room)
    {          
        return $this->model =  Follower::ofFollowerId($id)->ofFollowingId($room)->first();
    }

}
