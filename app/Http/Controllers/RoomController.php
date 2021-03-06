<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;

use App\Models\Room\Room;
use Illuminate\Http\Request;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Booking_Date\Booking_DateRepositoryInterface;
use App\Repositories\Follower\FollowerRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

use LaravelFullCalendar\Facades\Calendar;
use Excel;
use Illuminate\Support\Facades\Auth;

use App\Exports\RoomsExport;

use App\Models\Room\Booking_Date;

//**********************************For Room************************/
use App\Notifications\Room\ForRoom\RoomFollowed;
use App\Notifications\Room\ForRoom\RoomUnFollowed;
use App\Notifications\Room\ForRoom\RoomLiked;
use App\Notifications\Room\ForRoom\RoomUnLiked;
use App\Notifications\Room\ForRoom\BookingNotification;
//**********************************For Room************************/

//**********************************For User************************/
use App\Notifications\Room\ForUser\BookNotification;
use App\Notifications\Room\ForUser\CancelNotification;
use App\Notifications\Room\ForUser\FollowNotification;
use App\Notifications\Room\ForUser\UnFollowNotification;
use App\Rules\BookingOverlap;

//**********************************For User************************/
class RoomController extends Controller
{
    protected $userRepo;
    protected $profileRepo;
    protected $roomRepo;
    protected $hotelRepo;
    protected $bookingRepo;
    protected $followerRepo;
    protected $commentRepo;
    protected $notiRepo;

    public function __construct(
        RoomRepositoryInterface $roomRepo,
        HotelRepositoryInterface $hotelRepo,
        Booking_DateRepositoryInterface $bookingRepo,
        FollowerRepositoryInterface $followerRepo,
        UserRepositoryInterface $userRepo,
        CommentRepositoryInterface $commentRepo,
        ProfileRepositoryInterface $profileRepo,
        NotificationRepositoryInterface $notiRepo
    ) {
        $this->userRepo = $userRepo;
        $this->roomRepo = $roomRepo;
        $this->hotelRepo = $hotelRepo;
        $this->bookingRepo = $bookingRepo;
        $this->followerRepo = $followerRepo;
        $this->commentRepo = $commentRepo;
        $this->profileRepo = $profileRepo;
        $this->notiRepo = $notiRepo;
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
    public function show($locale, $roomid)
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

                if ($locale == 'jp') {
                    $calendar = Calendar::addEvents($events)->setOptions([
                        'handleWindowResize' => true,
                        'displayEventTime' => true,
                        'navLinks' => true,
                        'locale' => 'ja',
                    ]);
                } elseif ($locale == 'vi') {
                    $calendar = Calendar::addEvents($events)->setOptions([
                        'handleWindowResize' => true,
                        'displayEventTime' => true,
                        'navLinks' => true,
                        'locale' => 'vi',

                    ]);
                } else {
                    $calendar = Calendar::addEvents($events)->setOptions([
                        'handleWindowResize' => true,
                        'displayEventTime' => true,
                        'navLinks' => true,
                        'locale' => 'en',
                    ]);
                }
            }

            if (Auth::guest()) {

                return view('Room.homepage', compact('room', 'comments',  'calendar'))->with('locale', $locale);
            } else {

                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                $follower = $this->followerRepo->showfollowerRoom(Auth::user()->id, $room->id);
                return view('Room.homepage', compact('room', 'comments',  'calendar', 'follower', 'notifications'))->with('locale', $locale);
            }
        } else {
            $events = [];
            if ($locale == 'jp') {
                $calendar = Calendar::addEvents($events)->setOptions([
                    'handleWindowResize' => true,
                    'displayEventTime' => true,
                    'navLinks' => true,
                    'locale' => 'ja',
                ]);
            } elseif ($locale == 'vi') {
                $calendar = Calendar::addEvents($events)->setOptions([
                    'handleWindowResize' => true,
                    'displayEventTime' => true,
                    'navLinks' => true,
                    'locale' => 'vi',

                ]);
            } else {
                $calendar = Calendar::addEvents($events)->setOptions([
                    'handleWindowResize' => true,
                    'displayEventTime' => true,
                    'navLinks' => true,
                    'locale' => 'en',
                ]);
            }
            if (Auth::guest()) {

                return view('Room.homepage', compact('room', 'comments',  'calendar'))->with('locale', $locale);
            } else {

                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                $follower = $this->followerRepo->showfollowerRoom(Auth::user()->id, $room->id);
                return view('Room.homepage', compact('room', 'comments',  'calendar', 'follower', 'notifications'))->with('locale', $locale);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $room)
    {
        $room = $this->roomRepo->showRoom($room);
        $hotels = $this->hotelRepo->showall();
        if (!Auth::guest()) {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('Room.edit', compact('room', 'hotels', 'notifications'))->with('locale', $locale);
        }
        return view('Room.edit', compact('room', 'hotels'))->with('locale', $locale);
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

    public function search($locale)
    {

        if (
            isset($_GET['checkin']) or isset($_GET['checkout']) or isset($_GET['type_query']) or isset($_GET['bed_query'])
        ) {
            $query = $_GET['checkin'];
            $query2 = $_GET['checkout'];
            $query3 = $_GET['type_query'];
            $query4 = $_GET['bed_query'];

            $rooms = $this->roomRepo->searchAll($query, $query2, $query3, $query4);
            $rooms->appends(['checkin' => $query, 'checkout' => $query2, 'type_query' => $query3, 'bed_query' => $query4]);
            if (!Auth::guest()) {
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                return view('Room.search', compact('rooms', 'notifications'))->with('locale', $locale);
            }
            return view('Room.search', compact('rooms'))->with('locale', $locale);
        }
    }

    public function reserve($locale, $room)
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

                if ($locale == 'jp') {
                    $calendar = Calendar::addEvents($events)->setOptions([
                        'handleWindowResize' => true,
                        'displayEventTime' => true,
                        'navLinks' => true,
                        'locale' => 'ja',
                        'defaultView' => 'agendaWeek',
                    ]);
                } elseif ($locale == 'vi') {
                    $calendar = Calendar::addEvents($events)->setOptions([
                        'handleWindowResize' => true,
                        'displayEventTime' => true,
                        'navLinks' => true,
                        'locale' => 'vi',
                        'defaultView' => 'agendaWeek',
                    ]);
                } else {
                    $calendar = Calendar::addEvents($events)->setOptions([
                        'handleWindowResize' => true,
                        'displayEventTime' => true,
                        'navLinks' => true,
                        'locale' => 'en',
                        'defaultView' => 'agendaWeek',
                    ]);
                }
            }
            if (!Auth::guest()) {
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                return view('Reserve.homepage', compact('room',  'calendar', 'notifications'))->with('locale', $locale);
            }
            return view('Reserve.homepage', compact('room',  'calendar'))->with('locale', $locale);
        } else {
            $events = [];
            if ($locale == 'jp') {
                $calendar = Calendar::addEvents($events)->setOptions([
                    'handleWindowResize' => true,
                    'displayEventTime' => true,
                    'navLinks' => true,
                    'locale' => 'ja',
                    'defaultView' => 'agendaWeek',
                ]);
            } elseif ($locale == 'vi') {
                $calendar = Calendar::addEvents($events)->setOptions([
                    'handleWindowResize' => true,
                    'displayEventTime' => true,
                    'navLinks' => true,
                    'locale' => 'vi',
                    'defaultView' => 'agendaWeek',
                ]);
            } else {
                $calendar = Calendar::addEvents($events)->setOptions([
                    'handleWindowResize' => true,
                    'displayEventTime' => true,
                    'navLinks' => true,
                    'locale' => 'en',
                    'defaultView' => 'agendaWeek',
                ]);
            }
            if (!Auth::guest()) {
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
                return view('Reserve.homepage', compact('room',  'calendar', 'notifications'))->with('locale', $locale);
            }
            return view('Reserve.homepage', compact('room',  'calendar'))->with('locale', $locale);
        }
    }

    public function booking(Request $request, $locale)
    {

        $data = $request->validate([
            'checkin' => ['required', new BookingOverlap()],
            'checkout' => 'required|',
            'bookable_id' => 'required',
            'user_id' => 'required',
            'balance' => 'required',
        ]);

        $booking = new Booking_Date;
        $booking->checkin = $data['checkin'];
        $booking->checkout = $data['checkout'];

        $booking->bookable_id = $data['bookable_id'];
        $booking->user_id = $data['user_id'];
        $booking->bookable_type = 'App\Models\Room\Room';
        $booking->save();

        $profile = $this->profileRepo->showProfile($data['user_id']);

        $profile->balance = $data['balance'];
        $profile->update();

        $room = $this->roomRepo->showRoom($booking->bookable_id);
        $room->booking_time = $room->booking_time + 1;

        $room->update();
        $room->notify(new BookingNotification($room));
        $this->notiRepo->updateUserId($room->user_id, $room->id);
        $room->notify(new BookNotification($room));
        $this->notiRepo->updateUserId(Auth::user()->id, $room->id);
        return redirect()->route('room.show', ['locale' => $locale, 'id' => $room->id]);
    }

    public function cancel($locale, $room, $username)
    {
        $room = $this->roomRepo->showRoom($room);

        $user = $this->userRepo->showUser($username);

        $this->bookingRepo->cancel($room->id, $user->id);

        return redirect()->back();
    }

    public function follow($locale, $roomid, $username)
    {

        $room = $this->roomRepo->showRoom($roomid);

        $user = $this->userRepo->showUser($username);

        $user->following()->attach($room);

        $room->notify(new RoomFollowed($room));
        $this->notiRepo->updateUserId($room->user_id, $room->id);
        $room->notify(new FollowNotification($room));
        $this->notiRepo->updateUserId(Auth::user()->id, $room->id);
        return redirect()->back();
    }

    public function unfollow($locale, $roomid, $username)
    {

        $room = $this->roomRepo->showRoom($roomid);
        $user = $this->userRepo->showUser($username);

        $user->following()->detach($room);
        $room->notify(new RoomUnFollowed($room));
        $this->notiRepo->updateUserId($room->user_id, $room->id);
        $room->notify(new UnFollowNotification($room));
        $this->notiRepo->updateUserId(Auth::user()->id, $room->id);
        return redirect()->back();
    }

    public function like($locale, $roomid, $username)
    {
        $room = $this->roomRepo->showRoom($roomid);
        $user = $this->userRepo->showUser($username);
        $room->likes()->create([
            'user_id' => $user->id
        ]);
        $room->notify(new RoomLiked($room));
        $this->notiRepo->updateUserId($room->user_id, $room->id);
        return redirect()->back();
    }

    public function unlike($locale, $roomid)
    {
        $room = $this->roomRepo->showRoom($roomid);

        $room->likes()->delete();
        $room->notify(new RoomUnLiked($room));
        $this->notiRepo->updateUserId($room->user_id, $room->id);
        return redirect()->back();
    }


    public function comment(StoreComment $request, $locale, $roomid, $username)
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
