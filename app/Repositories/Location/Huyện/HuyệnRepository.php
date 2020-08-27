<?php

namespace App\Repositories\Location\Huyện;

use App\Repositories\BaseRepository;
use App\Models\Location\Huyện;

class HuyệnRepository extends BaseRepository implements HuyệnRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Location\Huyện::class;
    }

    public function showAll()
    {
        return $this->model->all();
    }

    public function huyens()
    {

       return $this->model = Huyện::query()
        ->join('tĩnhs','tĩnhs.id','=','huyệns.tĩnh_id')
        ->select(['huyệns.id','huyệns.huyen_name','huyệns.tĩnh_id','tĩnhs.tinh_name','huyệns.huyen_description'])
        ->paginate(6);
        
    }

    
}
