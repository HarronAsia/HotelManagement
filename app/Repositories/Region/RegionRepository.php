<?php

namespace App\Repositories\Region;

use App\Repositories\BaseRepository;

use App\Models\Region;
use Illuminate\Support\Facades\DB;


class RegionRepository extends BaseRepository implements RegionRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Region::class;
    }
    public function search($region)
    {
        return $this->model =  Region::where('title', 'LIKE', '%' . $region . '%')->paginate(100);
    }
   
    public function showall()
    {
        return $this->model = Region::withTrashed()->get();
    }

    public function paginate()
    {
        return $this->model = Region::withTrashed()->paginate(6);
    }

     public function showRegion($region)
    {
        return $this->model = Region::withTrashed()->OfTitle($region)->first();
    }

    public function destroyRegion($region)
    {
        $region = Region::OfTitle($region)->first();
        return $this->model = $region->delete();
    }

    public function restoreRegion($region)
    {
        $region = Region::onlyTrashed()->OfTitle($region)->first();
        return $this->model = $region->restore();
    }
}
