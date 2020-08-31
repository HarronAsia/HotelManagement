<?php

namespace App\Repositories\Location\Tĩnh;

use App\Repositories\BaseRepository;
use App\Models\Location\Tinh;

class TĩnhRepository extends BaseRepository implements TĩnhRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Location\Tinh::class;
    }

    public function showAll()
    {
        return $this->model->all();
    }

    public function tinhs()
    {

        return $this->model = Tinh::withTrashed()->paginate(64);
    }

    
}
