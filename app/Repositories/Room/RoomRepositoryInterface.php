<?php

namespace App\Repositories\Room;

interface RoomRepositoryInterface
{

    public function search($room);
    public function searchAll($room1, $room2, $room3, $room4, $room5, $room6);
    public function searchRoomonBed($bed, $room1, $room2, $room3, $room4, $room5);

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
