<?php

namespace App\Repositories\Images;

use App\Repositories\BaseRepository;

use App\Models\Images;

class ImagesRepository extends BaseRepository implements ImagesRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Images::class;
    }

    public function showall()
    {
        return $this->model = Images::withTrashed()->get();
    }

    public function showallimagesonroom($id)
    {
        return $this->model = Images::where('room_id',$id)->orderBy('created_at','desc')->paginate(6);
    }

    public function destroyRoom($room_image)
    {
        $image = Images::OfId($room_image)->first();
        return $this->model = $room_image->delete();
    }

    public function restoreRoom($room_image)
    {
        $image = Images::onlyTrashed()->OfId($room_image)->first();
        return $this->model = $room_image->restore();
    }
}
