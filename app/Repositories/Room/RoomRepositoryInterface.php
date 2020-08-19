<?php

namespace App\Repositories\Room;

interface RoomRepositoryInterface
{
    
    public function search($room);
    public function searchonHotel($hotel,$room);
    public function showall();
    public function paginate();
    
    public function showallroomonHotel($id);
    public function showRoom($room);
    public function destroyRoom($room);
    public function restoreRoom($room);
}
