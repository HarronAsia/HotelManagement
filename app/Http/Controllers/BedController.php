<?php

namespace App\Http\Controllers;

use App\Models\Room\Room;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

class BedController extends Controller
{
    protected $roomRepo;
    protected $notiRepo;

    public function __construct(RoomRepositoryInterface $roomRepo,NotificationRepositoryInterface $notiRepo)
    {
        $this->roomRepo = $roomRepo;
        $this->notiRepo = $notiRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale,$bed)
    {
        $rooms = $this->roomRepo->showallroomonBed($bed);
        if(!Auth::guest())
        {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('Category.homepage', compact('rooms', 'bed','notifications'))->with('locale',$locale);
        }
        return view('Category.homepage', compact('rooms', 'bed'))->with('locale',$locale);
    }

    public function search($locale,$bed)
    {
        
        if (
            isset($_GET['name_query']) or isset($_GET['floor_query']) or isset($_GET['type_query'])
            or isset($_GET['min_price']) or isset($_GET['max_price'])
        ) {
            
            $query = $_GET['name_query'];
            $query2 = $_GET['floor_query'];
            $query3 = $_GET['type_query'];
            $query4 = $_GET['min_price'];
            $query5 = $_GET['max_price'];
            $rooms = $this->roomRepo->searchRoomonBed($bed, $query, $query2, $query3, $query4, $query5);
            $rooms->appends(['name_query'=>$query,'floor_query'=>$query2,'type_query'=>$query3,'min_price'=>$query4,'max_price'=>$query5]);
            if(!Auth::guest())
            {
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                return view('Category.homepage', compact('rooms', 'bed','notifications'))->with('locale',$locale);
            }
            return view('Category.homepage', compact('rooms', 'bed'))->with('locale',$locale);
        } 
        else
        {
            
            $rooms = $this->roomRepo->showallroomonBed($bed);
            if(!Auth::guest())
            {
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                return view('Category.homepage', compact('rooms', 'bed','notifications'))->with('locale',$locale);
            }
            return view('Category.homepage', compact('rooms', 'bed'))->with('locale',$locale);
        }
      
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
}
