<?php

namespace App\Repositories\Hotel;

use App\Repositories\BaseRepository;

use App\Models\Hotel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class HotelRepository extends BaseRepository implements HotelRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Hotel::class;
    }

    public function search($hotel)
    {
       
        return $this->model = Hotel::join('users', 'hotels.user_id', '=', 'users.id')
        ->whereLike(['hotel_name','hotel_address','name'],$hotel)->paginate(100);
    }

    public function showall()
    {
        return $this->model = Cache::remember('hotels', now()->minute(10), function () {
            return Hotel::withTrashed()->get();
        });
    }

    public function paginate()
    {
        return $this->model = Hotel::withTrashed()->paginate(6);
    }

    public function showHotel($hotel)
    {
        return $this->model = Hotel::OfId($hotel)->first();
    }

    public function destroyHotel($hotel)
    {
        $hotel = Hotel::OfId($hotel)->first();
        return $this->model = $hotel->delete();
    }

    public function restoreHotel($hotel)
    {
        $hotel = Hotel::onlyTrashed()->OfId($hotel)->first();
        return $this->model = $hotel->restore();
    }
}
