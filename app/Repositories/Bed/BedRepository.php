<?php

namespace App\Repositories\Bed;

use App\Repositories\BaseRepository;

use App\Models\Bed;

class BedRepository extends BaseRepository implements BedRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Bed::class;
    }
   
    public function search($bed)
    {
        return $this->model =  Bed::where('bed_name', 'LIKE', '%' . $bed . '%')->paginate(100);
    }
    public function showall()
    {
        return $this->model = Bed::withTrashed()->get();
    }

    public function paginate()
    {
        return $this->model = Bed::withTrashed()->paginate(6);
    }

    public function showallBedonRoom($id)
    {
        return $this->model = Bed::where('room_id',$id)->orderBy('created_at','desc')->paginate(6);
    }

    public function showBed($Bed)
    {
        return $this->model = Bed::OfId($Bed)->first();
    }

    public function destroyBed($Bed)
    {
        $Bed = Bed::OfId($Bed)->first();
        return $this->model = $Bed->delete();
    }

    public function restoreBed($Bed)
    {
        $Bed = Bed::onlyTrashed()->OfId($Bed)->first();
        return $this->model = $Bed->restore();
        
    }
}
