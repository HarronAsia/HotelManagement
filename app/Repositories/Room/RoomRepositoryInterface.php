<?php

namespace App\Repositories\Room;

interface RoomRepositoryInterface
{

    public function search($room);
    public function searchonHotel($hotel, $room);
    public function showall();
    public function paginate();

    public function showallroomonHotel($id);
    public function showallroomonBed($bed);
    public function showRoom($room);
    public function destroyRoom($room);
    public function restoreRoom($room);

    public function calendarperYear();
    public function perWeek();
    public function perMonth();
    public function perYear();
    public function busymonth();
}
