<?php

namespace App\Http\Controllers;

use App\Models\Room;

use LaravelFullCalendar\Facades\Calendar;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Region\RegionRepositoryInterface;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $categoryRepo;
    protected $regionRepo;


    public function __construct(CategoryRepositoryInterface $categoryRepo, RegionRepositoryInterface $regionRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->regionRepo = $regionRepo;
 
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
        $categories = $this->categoryRepo->showall();
        $regions = $this->regionRepo->showall();

        return view('home', compact('categories', 'regions'));
    }


    public function test()
    {
        $events = [];
        $data = Room::all();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->room_name,
                    true,
                    new \DateTime($value->date_start),
                    new \DateTime($value->date_end . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => '#',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('test', compact('calendar'));
    }
}
