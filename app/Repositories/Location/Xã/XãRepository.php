<?php

namespace App\Repositories\Location\Xã;

use App\Repositories\BaseRepository;
use App\Models\Location\Xa;

class XãRepository extends BaseRepository implements XãRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Location\Xa::class;
    }

    public function showAll()
    {
        return $this->model->all();
    }

    public function xas()
    {

        //return $this->model = Xã::withTrashed()->paginate(6);
        return $this->model = Xa::query()
            ->join('huyens', 'huyens.id', '=', 'xas.huyen_id')
            ->join('tinhs', 'tinhs.id', '=', 'huyens.tinh_id')
            ->distinct()
            ->select(['xas.id', 'xas.xa_name', 'xas.huyen_id', 'huyens.huyen_name', 'huyens.tinh_id', 'tinhs.tinh_name', 'xas.xa_description'])
            ->paginate(100);
    }
}
