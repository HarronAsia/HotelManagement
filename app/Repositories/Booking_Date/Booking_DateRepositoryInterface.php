<?php

namespace App\Repositories\Booking_Date;

interface Booking_DateRepositoryInterface
{
    public function showall();
    public function paginate();
    
    public function showallBooking_DateonRoom($id);
    
    public function showBooking_Date($booking);
    public function destroyBooking_Date($booking);
    public function restoreBooking_Date($booking);

    public function cancel($booking,$user);
}
