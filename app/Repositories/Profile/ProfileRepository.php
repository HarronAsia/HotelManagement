<?php

namespace App\Repositories\Profile;

use App\Repositories\BaseRepository;

use App\Models\User\Profile;
use Illuminate\Support\Facades\DB;


class ProfileRepository extends BaseRepository implements ProfileRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User\Profile::class;
    }

    public function showProfile($id)
    {
        return $this->model = Profile::findOrFail($id);
    }
}
