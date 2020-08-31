<?php

namespace App\Repositories\Location\Huyện;

use App\Repositories\BaseRepository;
use App\Models\Location\Huyen;

class HuyệnRepository extends BaseRepository implements HuyệnRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Location\Huyen::class;
    }

    public function showAll()
    {
        return $this->model->all();
    }

    public function huyens()
    {

       return $this->model = Huyen::query()
        ->join('tinhs','tinhs.id','=','huyens.tinh_id')
        ->select(['huyens.id','huyens.huyen_name','huyens.tinh_id','tinhs.tinh_name','huyens.huyen_description'])
        ->paginate(100);
        
    }

    
}
