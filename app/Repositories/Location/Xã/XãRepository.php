<?php

namespace App\Repositories\Location\Xã;

use App\Repositories\BaseRepository;
use App\Models\Location\Xã;

class XãRepository extends BaseRepository implements XãRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Location\Xã::class;
    }

    public function showAll()
    {
        return $this->model->all();
    }

    public function xas()
    {
        //return $this->model = Xã::withTrashed()->paginate(6);
        return $this->model = Xã::query()
            ->join('tĩnhs', 'tĩnhs.id', '=', 'xãs.tĩnh_id')
            ->join('huyệns', 'huyệns.id', '=', 'xãs.huyện_id')
            ->distinct()
            ->select(['xãs.id', 'xãs.xa_name','xãs.huyện_id','huyệns.huyen_name', 'xãs.tĩnh_id', 'tĩnhs.tinh_name', 'xãs.xa_description'])
            ->paginate(64);
    }

   
}
