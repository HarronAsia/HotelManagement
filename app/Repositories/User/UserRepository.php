<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function search($user)
    {
        return $this->model = User::where('name', 'LIKE', '%' . $user . '%')->paginate(100);
    }

    public function showall()
    {
        return $this->model = User::withTrashed()->get();
    }

    public function paginate()
    {
        return $this->model = User::withTrashed()->paginate(6);
    }


    public function showUser($user)
    {
        return $this->model = User::OfName($user)->first();
    }

    public function destroyUser($user)
    {
        $user = User::OfId($user)->first();
        return $this->model = $user->delete();
    }
    
    public function restoreUser($user)
    {
        $user = User::onlyTrashed()->OfId($user)->first();
        return $this->model = $user->restore();
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
