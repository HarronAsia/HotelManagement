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

    public function paginate()
    {
        //return $this->model = Xã::withTrashed()->paginate(6);
        return $this->model = Xã::query()
            ->join('tĩnhs', 'tĩnhs.id', '=', 'xãs.tĩnh_id')
            ->join('huyệns', 'huyệns.id', '=', 'xãs.huyện_id')
            ->distinct()
            ->select(['xãs.id', 'xãs.xa_name','xãs.huyện_id','huyệns.huyen_name', 'xãs.tĩnh_id', 'tĩnhs.tinh_name', 'xãs.xa_description'])
            ->paginate(20);
    }

    // //************************************************************************ Sort ***********************************************************************************************/

    // public function showallascbyName()
    // {
    //     return $this->model = User::withTrashed()->orderBy('name','ASC')->get();
    // }

    // public function showalldesbyName()
    // {
    //     return $this->model = User::withTrashed()->orderBy('name','desc')->get();
    // }


    // public function showallascbyEmail()
    // {
    //     return $this->model = User::withTrashed()->orderBy('email','ASC')->get();
    // }

    // public function showalldesbyEmail()
    // {
    //     return $this->model = User::withTrashed()->orderBy('email','desc')->get();
    // }

    // public function showallascbyRole()
    // {
    //     return $this->model = User::withTrashed()->orderBy('role')->where('role','User')->get();
    // }

    // public function showalldesbyRole()
    // {
    //     return $this->model = User::withTrashed()->orderBy('role')->where('role','Admin')->get();
    // }

    // public function showallascbyCreated()
    // {
    //     return $this->model = User::withTrashed()->orderBy('created_at','asc')->get();
    // }

    // public function showalldesbyCreated()
    // {
    //     return $this->model = User::withTrashed()->orderBy('created_at','desc')->get();
    // }

    // public function showallascbyUpdated()
    // {
    //     return $this->model = User::withTrashed()->orderBy('updated_at','asc')->get();
    // }

    // public function showalldesbyUpdated()
    // {
    //     return $this->model = User::withTrashed()->orderBy('updated_at','desc')->get();
    // }

    // public function showallascbyDeleted()
    // {
    //     return $this->model = User::withTrashed()->orderBy('deleted_at','asc')->get();
    // }

    // public function showalldesbyDeleted()
    // {
    //     return $this->model = User::withTrashed()->orderBy('deleted_at','desc')->get();
    // }

    // //************************************************************************ Sort ***********************************************************************************************/
}
