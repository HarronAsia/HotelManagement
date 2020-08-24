<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreRoom;
use App\Http\Requests\StoreBooking;
use App\Http\Requests\StoreComment;

use App\Models\Bed;
use App\Models\Room;
use App\Models\Follower;
use Illuminate\Http\Request;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Images\ImagesRepositoryInterface;
use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Booking_Date\Booking_DateRepositoryInterface;
use App\Repositories\Follower\FollowerRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;

use LaravelFullCalendar\Facades\Calendar;
use Excel;

use App\Exports\RoomsExport;
use App\Http\Requests\StoreImage;
use App\Http\Requests\StoreProfile;
use App\Models\Booking_Date;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use LaravelFullCalendar\Calendar as LaravelFullCalendarCalendar;

class RoomController extends Controller
{
    protected $userRepo;
    protected $profileRepo;
    protected $roomRepo;
    protected $hotelRepo;
    protected $imagesRepo;
    protected $bookingRepo;
    protected $followerRepo;
    protected $commentRepo;

    public function __construct(
        RoomRepositoryInterface $roomRepo,
        ImagesRepositoryInterface $imagesRepo,
        HotelRepositoryInterface $hotelRepo,
        Booking_DateRepositoryInterface $bookingRepo,
        FollowerRepositoryInterface $followerRepo,
        UserRepositoryInterface $userRepo,
        CommentRepositoryInterface $commentRepo,
        ProfileRepositoryInterface $profileRepo
    ) {
        $this->userRepo = $userRepo;
        $this->roomRepo = $roomRepo;
        $this->imagesRepo = $imagesRepo;
        $this->hotelRepo = $hotelRepo;
        $this->bookingRepo = $bookingRepo;
        $this->followerRepo = $followerRepo;
        $this->commentRepo = $commentRepo;
        $this->profileRepo = $profileRepo;
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
    public function show($roomid)
    {
        $room = $this->roomRepo->showRoom($roomid);
        $comments = $this->commentRepo->showallonRoom($room->id);
        $booking_dates = $this->bookingRepo->showallBooking_DateonRoom($room->id);

        $data = $booking_dates;

        if ($data->count()) {
            foreach ($data as $key => $value) {

                $events = [];
                $events[] = Calendar::event(
                    $value->user->name,
                    true,
                    new \DateTime($value->checkin),
                    new \DateTime($value->checkout . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'route' => '#',
                    ]
                );

                $calendar = Calendar::addEvents($events)->setOptions([
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
            }

            if (Auth::guest()) {
                return view('Room.homepage', compact('room', 'comments',  'calendar'));
            } else {

                $follower = $this->followerRepo->showfollowerRoom(Auth::user()->id, $room->id);
                return view('Room.homepage', compact('room', 'comments',  'calendar', 'follower'));
            }
        }
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
            or isset($_GET['end_time_query']) or isset($_GET['type_query']) or isset($_GET['bed_query'])
        ) {
            $query = $_GET['start_date_query'];
            $query2 = $_GET['end_date_query'];
            $query3 = $_GET['start_time_query'];
            $query4 = $_GET['end_time_query'];
            $query5 = $_GET['type_query'];
            $query6 = $_GET['bed_query'];

            $rooms = Room::OfAll($query, $query2, $query3, $query4, $query5, $query6);
            // ->paginate(6);
            // $rooms->appends(array(['start_date_query'=>$query,'end_date_query'=>$query2,
            //                         'start_time_query'=>$query3,'end_time_query'=>$query4,
            //                         'type_query'=>$query5,'bed_query'=>$query6,'room_query'=>$query7]));

            return view('Room.search', compact('rooms'));
        }
        
    }

    public function reserve($room)
    {
        $room = $this->roomRepo->showRoom($room);

        $booking_dates = $this->bookingRepo->showallBooking_DateonRoom($room->id);

        $data = $booking_dates;

        if ($data->count()) {
            foreach ($data as $key => $value) {

                $events = [];
                $events[] = Calendar::event(
                    $value->user->name,
                    true,
                    new \DateTime($value->checkin),
                    new \DateTime($value->checkout . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'route' => '#',
                    ]
                );
                $calendar = Calendar::addEvents($events)->setOptions([
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
            }

            return view('Reserve.homepage', compact('room',  'calendar'));
        }
    }

    public function booking(Request $request)
    {
        
        $data = $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date|after_or_equal:checkin',
            'time_begin' => 'required',
            'time_end' => 'required|after:time_begin',
            'bookable_id' => 'required',
            'user_id' => 'required',
            'balance' => 'required',
        ]);
           
        $booking = new Booking_Date;
        $booking->checkin = $data['checkin'];
        $booking->checkout = $data['checkout'];
        $booking->time_begin = $data['time_begin'];
        $booking->time_end = $data['time_end'];
        $booking->bookable_id = $data['bookable_id'];
        $booking->user_id = $data['user_id'];
        $booking->bookable_type = 'App\Models\Room';
        $booking->save();

        $profile = $this->profileRepo->showProfile($data['user_id']);
        $profile->balance = $data['balance'];
        $profile->update();
        
        $room = $this->roomRepo->showRoom($booking->bookable_id);
        $room->booking_time = $room->booking_time + 1;
       
        $room->update();

        return redirect()->route('room.show', $room->id);
    }

    public function follow($roomid, $username)
    {

        $room = $this->roomRepo->showRoom($roomid);

        $user = $this->userRepo->showUser($username);

        $user->following()->attach($room);

        return redirect()->back();
    }

    public function unfollow($roomid, $username)
    {

        $room = $this->roomRepo->showRoom($roomid);
        $user = $this->userRepo->showUser($username);

        $user->following()->detach($room);

        return redirect()->back();
    }

    public function like($roomid, $username)
    {
        $room = $this->roomRepo->showRoom($roomid);
        $user = $this->userRepo->showUser($username);
        $room->likes()->create([
            'user_id' => $user->id
        ]);

        return redirect()->back();
    }

    public function unlike($roomid)
    {
        $room = $this->roomRepo->showRoom($roomid);

        $room->likes()->delete();

        return redirect()->back();
    }

    // public function images(StoreImage $request, $roomid)
    // {
    //     $data = $request->validated();
    //     dd($data);
    //     $room = $this->roomRepo->showRoom($roomid);
    // }

    public function images($roomid)
    {
        $room = $this->roomRepo->showRoom($roomid);
        $images = $this->imagesRepo->showallimagesonroom($room->id);
        return view('Room.Images',compact('room','images'));
    }
    
    public function comment(StoreComment $request, $roomid, $username)
    {
        $data = $request->validated();
        
        $room = $this->roomRepo->showRoom($roomid);
        $user = $this->userRepo->showUser($username);

        $hotel = $this->hotelRepo->showHotel($room->hotel_id);

        if ($request->hasFile('comment_image')) {

            $data['comment_image'] = $request->file('comment_image');

            $extension = $data['comment_image']->getClientOriginalExtension();
            $filename =  Auth::user()->name . '.' . $extension;
            $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/' . $room->room_name . '/comment' . '/' . $user->name . '/');

            $data['comment_image']->move($path, $filename);
            $data['comment_image'] = $filename;
            
            $room->comment()->create([
                
                'comment_detail' => $data['comment_detail'],
                'comment_image' =>  $data['comment_image'],
                'user_id' => $data['user_id'],
            ]);

            return redirect()->back();
        } else {
            $room->comment()->create([
                'comment_detail' => $data['comment_detail'],
                'user_id' => $data['user_id'],
            ]);

            return redirect()->back();
        }
    }

    public function export()
    {
        return Excel::download(new RoomsExport, 'rooms_list.csv');
    }
}
