<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User\User;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User\User::class;
    }

    public function search($user)
    {
        return $this->model = User::whereLike(['name','email'], $user)->paginate(100);
    }

    public function showall()
    {
        //return $this->model = User::withTrashed()->get();
       return $this->model = Cache::remember('users', now()->minute(10), function () {
            return User::withTrashed()->get();
        });
        
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
    public function HighestPaidPerWeek()
    {

        return $this->model = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('booking__dates', 'users.id', '=', 'booking__dates.user_id')
            ->select(
                DB::raw('HOUR(booking__dates.checkin) as duration'),

                DB::raw('users.id as id'),
                DB::raw('users.name as name'),
                DB::raw('users.email as email'),
                DB::raw('profiles.gender as gender'),
                DB::raw('profiles.balance as balance'),
            )

            ->groupBy('duration', 'id', 'name', 'email', 'gender', 'balance')
            ->orderBy('duration', 'desc')
            ->orderBy('balance', 'desc')

            ->limit(9)
            ->get()
            ->sortBy('WEEK(booking__dates.checkin)');
    }

    public function HighestPaidPerMonth()
    {

        //return $this->model = DB::select('select year(created_at) as year, month(created_at) as month, sum(room_price) as total_amount from rooms group by year(created_at), month(created_at)');
        return $this->model = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('booking__dates', 'users.id', '=', 'booking__dates.user_id')
            ->select(
                DB::raw('HOUR(booking__dates.checkin) as duration'),
                DB::raw('users.id as id'),
                DB::raw('users.name as name'),
                DB::raw('users.email as email'),
                DB::raw('profiles.gender as gender'),
                DB::raw('profiles.balance as balance'),
            )

            ->groupBy('duration', 'id', 'name', 'email', 'gender', 'balance')
            ->orderBy('duration', 'desc')
            ->orderBy('balance', 'desc')

            ->limit(9)
            ->get()
            ->sortBy('MONTH(booking__dates.checkin)');
    }

    public function HighestPaidPerYear()
    {
        //return $this->model = DB::select('select year(created_at) as year, month(created_at) as month, sum(room_price) as total_amount from rooms group by year(created_at), month(created_at)');
        return $this->model = User::join('booking__dates', 'users.id', '=', 'booking__dates.user_id')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->select(
                DB::raw('HOUR(booking__dates.checkin) as duration'),
                DB::raw('users.id as id'),
                DB::raw('users.name as name'),
                DB::raw('users.email as email'),
                DB::raw('profiles.gender as gender'),
                DB::raw('profiles.balance as balance'),
            )

            ->groupBy('duration', 'id', 'name', 'email', 'gender', 'balance')
            ->orderBy('duration', 'desc')
            ->orderBy('balance', 'desc')

            ->limit(9)
            ->get()
            ->sortBy('YEAR(booking__dates.checkin) ');
    }
}
