<?php

namespace App\Http\Controllers;

use App\Models\Location\Tĩnh;

use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Bed\BedRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $roomRepo;
    protected $bedRepo;
    protected $notiRepo;

    public function __construct(RoomRepositoryInterface $roomRepo, BedRepositoryInterface $bedRepo, NotificationRepositoryInterface $notiRepo)
    {
        $this->roomRepo = $roomRepo;
        $this->bedRepo = $bedRepo;
        $this->notiRepo = $notiRepo;
    }

    public function admin(Request $req)
    {
        return view('unauthorized')->withMessage("admin");
    }
    public function member(Request $req)
    {
        return view('unauthorized')->withMessage("member");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale)
    {
        $rooms = $this->roomRepo->showall();
        $beds = $this->bedRepo->showall();
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        
        return view('home', compact('rooms', 'beds','notifications'))->with('locale',$locale);
    }

    public function readAt($locale,$id)
    {
        $this->notiRepo->readAt($id);

        return redirect()->back();
    }

    public function readAll()
    {

        $this->notiRepo->readAll();
        return redirect()->back();
    }

    public function showAllNotifications($locale)
    {
        
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);

        return view('Notifications.lists', compact('locale','notifications'));
    }


    public function test()
    {
        return view('homework.test');
    }

    public function test2()
    {
        return view('homework.test2');
    }

}
