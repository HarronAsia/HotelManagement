<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImage;
use App\Http\Requests\StoreRoom;
use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;

use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Images\ImagesRepositoryInterface;
use App\Repositories\Hotel\HotelRepositoryInterface;

use LaravelFullCalendar\Facades\Calendar;

class RoomController extends Controller
{
    protected $roomRepo;
    protected $hotelRepo;
    protected $imagesRepo;

    public function __construct(RoomRepositoryInterface $roomRepo, ImagesRepositoryInterface $imagesRepo, HotelRepositoryInterface $hotelRepo)
    {
        $this->roomRepo = $roomRepo;
        $this->imagesRepo = $imagesRepo;
        $this->hotelRepo = $hotelRepo;
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
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($room)
    {

        $room = $this->roomRepo->showRoom($room);
        $images = $this->imagesRepo->showallimagesonroom($room->id);

        $event = [];
        $data = $room;


        $event[] = Calendar::event(
            $data->room_name,
            true,
            new \DateTime($data->date_start),
            new \DateTime($data->date_end . ' +1 day'),
            null,
            // Add color and link on event
            [
                'color' => '#f05050',
                'route' => '#',
            ]
        );

        $calendar = Calendar::addEvents($event)->setOptions([
            'selectable' => true,
            'editable' => true,
            'handleWindowResize' => true,
            'displayEventTime' => true,
            // 'buttonText'=> [
            //     'prevYear'=> '&laquo;', 
            //     'nextYear'=> '&raquo;',  
            //     'today'=>   '今日',
            //     'month'=>    '月',
            //     'week'=>     '週',
            //     'day'=>      '日'
            // ],
            //   // 月名称
            // 'monthNames'=> ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            // // 月略称
            // 'monthNamesShort'=> ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            // // 曜日名称
            // 'dayNames'=> ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
            // // 曜日略称
            // 'dayNamesShort'=> ['日', '月', '火', '水', '木', '金', '土'],
        ]);
        return view('Room.homepage', compact('room', 'images', 'calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($room)
    {
        $room = $this->roomRepo->showRoom($room);
        $hotels = $this->hotelRepo->showall();
        return view('Room.edit', compact('room', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }

    public function search()
    {

        if (
            isset($_GET['start_date_query']) or isset($_GET['end_date_query']) or isset($_GET['start_time_query'])
            or isset($_GET['end_time_query']) or isset($_GET['type_query']) or isset($_GET['bed_query']) or isset($_GET['room_query'])
        ) {
            $query = $_GET['start_date_query'];
            $query2 = $_GET['end_date_query'];
            $query3 = $_GET['start_time_query'];
            $query4 = $_GET['end_time_query'];
            $query5 = $_GET['type_query'];
            $query6 = $_GET['bed_query'];
            $query7 = $_GET['room_query'];
            $rooms = Room::OfAll($query, $query2, $query3, $query4, $query5, $query6, $query7)->get();

            return view('Room.search', compact('rooms'));
        }
    }

    public function reserve($room)
    {
        $room = $this->roomRepo->showRoom($room);
        return view('Reserve.homepage',compact('room'));
    }
}
