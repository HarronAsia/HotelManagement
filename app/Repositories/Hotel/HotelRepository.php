<?php

namespace App\Repositories\Hotel;

use App\Repositories\BaseRepository;

use App\Models\Hotel;
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
      
        return $this->model = Hotel::OfName($hotel)->paginate(100);
    }

    public function searchOnCategory($hotel,$category)
    {
      
        return $this->model = Hotel::OfCategoryId($category)->OfName($hotel)->paginate(100);
    }

    public function showall()
    {
        return $this->model = Hotel::withTrashed()->get();
    }

    public function paginate()
    {
        return $this->model = Hotel::withTrashed()->paginate(6);
    }

    public function showalloncategory($id)
    {
        return $this->model = Hotel::where('category_id',$id)->orderBy('created_at','desc')->paginate(6);
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
