<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepositoryInterface;

class BedController extends Controller
{
    protected $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bed)
    {
        $rooms = $this->roomRepo->showallroomonBed($bed);
        return view('Category.homepage', compact('rooms', 'bed'));
    }

    public function search($bed)
    {
dd(request()->all());
        if (
            isset($_GET['name_query']) or isset($_GET['floor_query']) or isset($_GET['type_query'])
            or isset($_GET['min_price']) or isset($_GET['max_price'])
        ) {
            dd("1");
            $query = $_GET['name_query'];
            $query2 = $_GET['floor_query'];
            $query3 = $_GET['type_query'];
            $query4 = $_GET['min_price'];
            $query5 = $_GET['max_price'];

            $rooms = Room::OfAll2($bed, $query, $query2, $query3, $query4, $query5);
            // ->paginate(6);
            // $rooms->appends(array(['start_date_query'=>$query,'end_date_query'=>$query2,
            //                         'start_time_query'=>$query3,'end_time_query'=>$query4,
            //                         'type_query'=>$query5,'bed_query'=>$query6,'room_query'=>$query7]));

            return view('Category.homepage', compact('rooms', 'bed'));
        } 
        elseif(isset($_GET['cheapest']))
        {
            dd("2");
            $rooms = $this->roomRepo->cheapest($bed);
            return view('Category.homepage', compact('rooms', 'bed'));
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
