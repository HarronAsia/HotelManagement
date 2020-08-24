<?php

namespace App\Repositories\Hotel;

interface HotelRepositoryInterface
{
    public function search($hotel);
    public function showall();
    public function paginate();


    public function showHotel($hotel);

    public function destroyHotel($hotel);
    public function restoreHotel($hotel);
}
