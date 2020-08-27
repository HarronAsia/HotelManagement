<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Exports\HotelsExport;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Room\RoomRepositoryInterface;

use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

class HotelController extends Controller
{
    protected $hotelRepo;
    protected $roomRepo;
    protected $notiRepo;

    public function __construct(HotelRepositoryInterface $hotelRepo, RoomRepositoryInterface $roomRepo,NotificationRepositoryInterface $notiRepo)
    {
        $this->hotelRepo = $hotelRepo;
        $this->roomRepo = $roomRepo;
        $this->notiRepo = $notiRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       
       
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
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('Hotels.search',compact('hotels','notifications'));
    }

    public function export()
    {
        return Excel::download(new HotelsExport, 'hotels_list.csv');
    }
}
