<?php

namespace App\Http\Controllers;

use App\Models\Room;

use LaravelFullCalendar\Facades\Calendar;
use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Bed\BedRepositoryInterface;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $roomRepo;
    protected $bedRepo;

    public function __construct(RoomRepositoryInterface $roomRepo,BedRepositoryInterface $bedRepo)
    {
        $this->roomRepo = $roomRepo;
        $this->bedRepo = $bedRepo;
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
    public function index()
    {

        $rooms = $this->roomRepo->showall();
        $beds = $this->bedRepo->showall();
        return view('home', compact('rooms','beds'));
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
