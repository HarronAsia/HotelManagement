<?php

namespace App\Repositories\Room;

use Carbon\Carbon;

use App\Models\Room\Room;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Room\Room::class;
    }

    public function search($room)
    {
        return $this->model = Room::join('users', 'rooms.user_id', '=', 'users.id')
        ->whereLike(['room_name','room_condition','room_status','name'], $room )->paginate(100);
    }

    public function showall()
    {

        return $this->model = Cache::remember('rooms', now()->minute(10), function () {
            return Room::withTrashed()->orderBy('booking_time', 'desc')->get();
        });
    
    }

    public function paginate()
    {
        return $this->model = Room::withTrashed()->paginate(64);
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
        return $this->model = Cache::remember('rooms', now()->minute(10), function () {
            return Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->where('booking__dates.checkin', '>=', Carbon::now()->startOfYear())
            ->where('booking__dates.checkout','<=', Carbon::now()->endOfYear())
            ->get();
        });
        
    }

    public function perWeek()
    {
        return $this->model = Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->select(

                DB::raw('rooms.id as id'),
                DB::raw('rooms.room_name as name'),
                DB::raw('room_condition as conditions'),
                DB::raw('booking_time as booking'),

            )
            ->groupBy('id', 'name')

            ->orderBy('booking', 'desc')
            ->limit(10)
            ->get()
            ->sortBy('WEEK(booking__dates.checkin)');
    }

    public function perMonth()
    {
        return $this->model = Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->select(
                DB::raw('rooms.id as id'),
                DB::raw('rooms.room_name as name'),
                DB::raw('room_condition as conditions'),
                DB::raw('booking_time as booking'),

            )
            ->groupBy('id', 'name')

            ->orderBy('booking', 'desc')
            ->limit(10)
            ->get()
            ->sortBy('MONTH(booking__dates.checkin)');
    }

    public function perYear()
    {

        return $this->model = Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->select(
                DB::raw('rooms.id as id'),
                DB::raw('rooms.room_name as name'),
                DB::raw('room_condition as conditions'),
                DB::raw('booking_time as booking'),

            )
            ->groupBy('id', 'name')

            ->orderBy('booking', 'desc')
            ->limit(10)
            ->get()
            ->sortBy('YEAR(booking__dates.checkin)');
    }

    public function busymonth()
    {
        return $this->model = Room::join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->select(
                DB::raw('YEAR(booking__dates.checkin) as year'),
                DB::raw('MONTH(booking__dates.checkin) as month'),
                DB::raw('count(*) as busymonth'),
            )
            ->groupBy('year', 'month')
            ->orderBy('busymonth','desc')
            ->limit(6)
            ->get();
    }

    public function searchAll($room1, $room2, $room3, $room4, $room5, $room6)
    {

        return $this->model = Room::query()
            ->join('beds', 'rooms.id', '=', 'beds.room_id')
            ->whereLike('room_type', $room5)
            ->whereLike('bed_type', $room6)
            ->whereLike('room_condition', 'Available')
            ->distinct()
            ->join('booking__dates', 'rooms.id', '=', 'booking__dates.bookable_id')
            ->whereLike('checkin', $room1)
            ->whereLike('checkout', $room2)
            ->whereLike('TIME(checkin)', $room3)
            ->whereLike('TIME(time_end)', $room4)
            ->select(['rooms.id', 'rooms.room_name', 'rooms.room_type', 'rooms.room_condition', 'beds.bed_type', 'rooms.room_description'])
            ->paginate(6);
    }

    public function searchRoomonBed($bed, $room1, $room2, $room3, $room4, $room5)
    {

        return $this->model = Room::query()
            ->join('beds', 'rooms.id', '=', 'beds.room_id')
            ->whereLike('room_name', $room1)
            ->whereLike('room_floor', $room2)
            ->whereLike('room_type', $room3)
            ->whereBetween('room_price', [$room4, $room5])
            ->whereLike('room_condition', 'Available')
            ->whereLike('bed_type', $bed)
            ->distinct()
            ->select(['rooms.id', 'rooms.room_name', 'rooms.room_type', 'rooms.room_condition', 'beds.bed_type', 'rooms.room_description'])
            ->paginate(6);
    }
}
