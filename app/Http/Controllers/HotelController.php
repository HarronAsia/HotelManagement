<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;

use Excel;

use App\Exports\HotelsExport;
class HotelController extends Controller
{
    protected $hotelRepo;
    protected $roomRepo;

    public function __construct(HotelRepositoryInterface $hotelRepo, RoomRepositoryInterface $roomRepo)
    {
        $this->hotelRepo = $hotelRepo;
        $this->roomRepo = $roomRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $hotel = $this->hotelRepo->showHotel($id);
            $rooms = $this->roomRepo->searchonHotel($hotel->id,$search_query);
            return view('Hotels.homepage', compact('rooms', 'hotel'));
        } else {
            $hotel = $this->hotelRepo->showHotel($id);
            $rooms = $this->roomRepo->showallroomonHotel($hotel->id);
    
            return view('Hotels.homepage', compact('rooms', 'hotel'));
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

    public function search()
    {
        $search_query = $_GET['query'];
        $hotels = Hotel::where('hotel_name', 'LIKE', '%' . $search_query . '%')->get();
        return view('Hotels.search',compact('hotels'));
    }

    public function export()
    {
        return Excel::download(new HotelsExport, 'hotels_list.csv');
    }
}
