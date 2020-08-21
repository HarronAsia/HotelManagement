<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Follower\FollowerRepositoryInterface;

class FollowerController extends Controller
{

    protected $userRepo;
    protected $roomRepo;
    protected $followerRepo;

    public function __construct(UserRepositoryInterface $userRepo, RoomRepositoryInterface $roomRepo, FollowerRepositoryInterface $followerRepo)
    {
        $this->userRepo = $userRepo;
        $this->roomRepo = $roomRepo;
        $this->followerRepo = $followerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function follow($room, $user)
    {

        $room = $this->roomRepo->showRoom($room);

        $user = $this->userRepo->showUser($user);

        $user->following()->attach($room);

        return redirect()->back();
    }

    public function unfollow($room, $userid)
    {

        $room = $this->roomRepo->showRoom($room);
        $user = $this->userRepo->showUser($userid);

        $user->following()->detach($room);

        return redirect()->back();
    }
}
