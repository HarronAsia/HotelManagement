<?php

namespace App\Repositories\Location\Tĩnh;

use App\Repositories\BaseRepository;
use App\Models\Location\Tĩnh;

class TĩnhRepository extends BaseRepository implements TĩnhRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Location\Tĩnh::class;
    }

    public function showAll()
    {
        return $this->model->all();
    }

    public function tinhs()
    {

        return $this->model = Tĩnh::withTrashed()->get();
    }

    
}
