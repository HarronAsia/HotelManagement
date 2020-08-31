<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Http\Requests\StoreProfile;
use App\Models\User\Profile;
use App\Models\User\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

use Excel;

use App\Exports\UsersExport;

class UserController extends Controller
{
    protected $userRepo;
    protected $profileRepo;
    protected $notiRepo;

    public function __construct(UserRepositoryInterface $userRepo, ProfileRepositoryInterface $profileRepo, NotificationRepositoryInterface $notiRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
        $this->notiRepo = $notiRepo;
    }

    public function view_profile($locale, $user)
    {
        $user = $this->userRepo->showUser($user);
        if (!Auth::guest()) {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('User.profile', compact('user', 'notifications'))->with('locale', $locale);
        }
        return view('User.profile', compact('user'))->with('locale', $locale);
    }

    public function add_profile($locale, $user)
    {
        if (Auth::user()->name != $user) {
            return redirect()->route('profile.view', ['locale' => $locale, 'user' => Auth::user()->name]);
        } else {
            $user = $this->userRepo->showUser($user);
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('User.add', compact('user', 'notifications'))->with('locale', $locale);
        }
    }

    public function store_profile(StoreProfile $request, $locale, $user)
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

            return redirect()->route('profile.view', ['locale' => $locale, 'user' => $user]);
        } else {

            $profile->update();
            return redirect()->route('profile.view', ['locale' => $locale, 'user' => $user]);
        }
    }

    public function edit_profile($locale, $user, $profile)
    {
        dd($profile);
        if (Auth::user()->name != $user) {
            return redirect()->route('profile.view', ['locale' => $locale, 'user' => Auth::user()->name]);
        } else {
            if (Auth::user()->profile->id != $profile) {
                return redirect()->route('profile.view', ['locale' => $locale, 'user' => Auth::user()->name]);
            } else {
                $profile = $this->profileRepo->showProfile($profile);
                $user = $this->userRepo->showUser($user);
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                return view('User.edit', compact('user', 'profile', 'notifications'))->with('locale', $locale);
            }
        }
    }

    public function update_profile(StoreProfile $request, $locale, $user, $profile)
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

            return redirect()->route('profile.view', ['locale' => $locale, 'user' => $user]);
        } else {

            $profile->update();
            return redirect()->route('profile.view', ['locale' => $locale, 'user' => $user]);
        }
    }

    public function search($locale)
    {
        $search_query = $_GET['query'];
        $users = User::where('name', 'LIKE', '%' . $search_query . '%')->get();
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('Admin.Users.lists', compact('users', 'notifications'))->with('locale', $locale);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users_list.csv');
    }
}
