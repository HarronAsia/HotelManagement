<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProfile;
use App\Models\Profile;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;

use Excel;

use App\Exports\UsersExport;
class UserController extends Controller
{
    protected $userRepo;
    protected $profileRepo;

    public function __construct(UserRepositoryInterface $userRepo, ProfileRepositoryInterface $profileRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
    }

    public function view_profile($user)
    {
        $user = $this->userRepo->showUser($user);
        return view('User.profile', compact('user'));
    }

    public function add_profile($user)
    {
        if (Auth::user()->name != $user) {
            return redirect()->route('profile.show', Auth::user()->name);
        } else {
            $user = $this->userRepo->showUser($user);
            return view('User.add', compact('user'));
        }
    }

    public function store_profile(StoreProfile $request, $user)
    {

        $data = $request->validated();

        $profile = new Profile;
        $profile->username = $data['username'];
        $profile->number = $data['number'];
        $profile->dob = $data['dob'];
        $profile->gender = $data['gender'];
        $profile->place = $data['place'];
        $profile->job = $data['job'];
        $profile->blood = $data['blood'];
        $profile->relationship = $data['relationship'];
        $profile->bio = $data['bio'];
        $profile->google_plus_link = $data['google_plus_link'];
        $profile->yahoo_link = $data['yahoo_link'];
        $profile->skype_link = $data['skype_link'];
        $profile->facebook_link = $data['facebook_link'];
        $profile->twitter_link = $data['twitter_link'];
        $profile->instagram_link = $data['instagram_link'];
        $profile->user_id = $data['user_id'];

        if ($request->hasFile('avatar_image')) {

            $extension = $data['avatar_image']->getClientOriginalExtension();
            $filename = $user . '.' . $extension;
            $path = storage_path('app/public/user/' . $user . '/image' . '/');

            $data['avatar_image']->move($path, $filename);

            $data['avatar_image'] = $filename;
            $profile->avatar_image = $data['avatar_image'];

            $profile->update();

            return redirect()->route('profile.view', $user);
        } else {

            $profile->update();
            return redirect()->route('profile.view', $user);
        }
    }

    public function edit_profile($user, $profile)
    {
        $profile = $this->profileRepo->showProfile($profile);
        $user = $this->userRepo->showUser($user);
        return view('User.edit', compact('user', 'profile'));
    }

    public function update_profile(StoreProfile $request, $user, $profile)
    {
        $data = $request->validated();

        $profile = $this->profileRepo->showProfile($profile);

        $profile->username = $data['username'];
        $profile->number = $data['number'];
        $profile->dob = $data['dob'];
        $profile->place = $data['place'];
        $profile->job = $data['job'];
        $profile->gender = $data['gender'];
        $profile->blood = $data['blood'];
        $profile->relationship = $data['relationship'];
        $profile->bio = $data['bio'];
        $profile->google_plus_link = $data['google_plus_link'];
        $profile->yahoo_link = $data['yahoo_link'];
        $profile->skype_link = $data['skype_link'];
        $profile->facebook_link = $data['facebook_link'];
        $profile->twitter_link = $data['twitter_link'];
        $profile->instagram_link = $data['instagram_link'];
        $profile->user_id = $data['user_id'];

        $old_avatar_image = $profile->avatar_image;

        if ($request->hasFile('avatar_image')) {

            $extension = $data['avatar_image']->getClientOriginalExtension();
            $filename = $user . '.' . $extension;

            $path = storage_path('app/public/user/' . $user . '/image' . '/');

            $data['avatar_image']->move($path, $filename);

            if (!file_exists($path . $filename)) {

                $data['avatar_image']->move($path, $filename);
            } elseif (!file_exists($path . $old_avatar_image)) {

                $data['avatar_image']->move($path, $filename);
                unlink($path . $old_avatar_image);
            }

            $data['avatar_image'] = $filename;
            $profile->avatar_image = $data['avatar_image'];

            $profile->update();

            return redirect()->route('profile.view', $user);
        } else {

            $profile->update();
            return redirect()->route('profile.view', $user);
        }
    }

    public function search()
    {
        $search_query = $_GET['query'];
        $users = User::where('name', 'LIKE', '%' . $search_query . '%')->get();
        return view('Admin.Users.lists', compact($users));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users_list.csv');
    }
}
