<?php

namespace App\Repositories\Booking_Date;

use App\Repositories\BaseRepository;

use App\Models\Room\Booking_Date;

class Booking_DateRepository extends BaseRepository implements Booking_DateRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Room\Booking_Date::class;
    }
   
    public function showall()
    {
        return $this->model = Booking_Date::withTrashed()->get();
    }

    public function paginate()
    {
        return $this->model = Booking_Date::withTrashed()->paginate(6);
    }

    public function showallBooking_DateonRoom($id)
    {
        
        return $this->model = Booking_Date::where('bookable_id',$id)->orderBy('created_at','desc')->get();
    }

    public function showBooking_Date($booking)
    {
        return $this->model = Booking_Date::OfId($booking)->first();
    }

    public function destroyBooking_Date($booking)
    {
        $Booking_Date = Booking_Date::OfId($booking)->first();
        return $this->model = $Booking_Date->delete();
    }

    public function restoreBooking_Date($booking)
    {
        $Booking_Date = Booking_Date::onlyTrashed()->OfId($booking)->first();
        return $this->model = $Booking_Date->restore();
        
    }
}
