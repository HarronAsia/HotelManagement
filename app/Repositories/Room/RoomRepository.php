<?php

namespace App\Repositories\Room;

use Carbon\Carbon;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

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

    public function searchonHotel($hotel, $room)
    {
        return $this->model = Room::OfHotel($hotel)->where('room_name', 'LIKE', '%' . $room . '%')->paginate(100);
    }

    public function showall()
    {
        return $this->model = Room::withTrashed()->orderBy('booking_time', 'desc')->get();
    }

    public function paginate()
    {
        return $this->model = Room::withTrashed()->paginate(6);
    }

    public function showallroomonHotel($id)
    {
        return $this->model = Room::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(6);
    }

    public function showallroomonBed($bed)
    {

        return $this->model = Room::query()->join('beds', 'rooms.id', '=', 'beds.room_id')
            ->select(['rooms.id', 'rooms.room_name', 'rooms.room_type', 'rooms.room_condition', 'beds.bed_type', 'rooms.room_description'])
            ->where('bed_type', $bed)->orderBy('rooms.created_at', 'desc')->paginate(6);
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

    public function calendarperYear()
    {
        return $this->model = Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')     
            ->where('booking__dates.checkin','>=',Carbon::now()->startOfYear())
            ->get();
    }

    public function perMonth()
    {
        //return $this->model = DB::select('select year(created_at) as year, month(created_at) as month, sum(room_price) as total_amount from rooms group by year(created_at), month(created_at)');
        return $this->model = Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->select(

                DB::raw('MONTH(booking__dates.checkin) as date'),
                DB::raw('rooms.id as id'),
                DB::raw('rooms.room_name as name'),
                DB::raw('room_condition as conditions'),
                DB::raw('booking_time as booking'),

            )
            ->groupBy('date', 'id', 'name')

            ->orderBy('booking', 'desc')
            ->limit(10)
            ->get()
            ->sortBy('date');
    }

    public function perYear()
    {
        //return $this->model = DB::select('select year(created_at) as year, month(created_at) as month, sum(room_price) as total_amount from rooms group by year(created_at), month(created_at)');
        return $this->model = Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->select(
                DB::raw('YEAR(booking__dates.checkin) as date'),
                DB::raw('rooms.id as id'),
                DB::raw('rooms.room_name as name'),
                DB::raw('room_condition as conditions'),
                DB::raw('booking_time as booking'),

            )
            ->groupBy('date', 'id', 'name')

            ->orderBy('booking', 'desc')
            ->limit(10)
            ->get()
            ->sortBy('date');
    }
}
