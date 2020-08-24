<?php

namespace App\Repositories\Room;

use App\Repositories\BaseRepository;

use App\Models\Room;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Room::class;
    }
    
    public function search($room)
    {
        return $this->model = Room::where('room_name', 'LIKE', '%' . $room . '%')->paginate(100);
    }

    public function searchonHotel($hotel,$room)
    {
        return $this->model = Room::OfHotel($hotel)->where('room_name', 'LIKE', '%' . $room . '%')->paginate(100);
    }

    public function showall()
    {
        return $this->model = Room::withTrashed()->orderBy('booking_time','desc')->where('room_condition','Available')->get();
    }

    public function paginate()
    {
        return $this->model = Room::withTrashed()->paginate(6);
    }

    public function showallroomonHotel($id)
    {
        return $this->model = Room::where('hotel_id',$id)->orderBy('created_at','desc')->paginate(6);
    }

    public function showallroomonBed($bed)
    {
       
        return $this->model = Room::query()->join('beds', 'rooms.id', '=', 'beds.room_id')
        ->select(['rooms.id', 'rooms.room_name', 'rooms.room_type', 'rooms.room_condition', 'beds.bed_type', 'rooms.room_description'])
        ->where('bed_type',$bed)->orderBy('rooms.created_at','desc')->paginate(6);
    }

    public function showRoom($room)
    {
        return $this->model = Room::OfId($room)->first();
    }

    public function destroyRoom($room)
    {
        $room = Room::OfId($room)->first();
        return $this->model = $room->delete();
    }

    public function restoreRoom($room)
    {
        $room = Room::onlyTrashed()->OfId($room)->first();
        return $this->model = $room->restore();
        
    }
}
