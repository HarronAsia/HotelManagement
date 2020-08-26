<?php

namespace App\Http\Controllers;

use Excel;


use Carbon\Carbon;
use App\Models\Hotel;
use App\Models\Room\Bed;
use App\Models\Room\Room;
use App\Models\Room\Booking_Date;
use App\Models\User\User;
use App\Models\User\Profile;
use App\Models\Location\Tĩnh;
use App\Models\Location\Huyện;
use App\Models\Location\Xã;


use App\Exports\BedsExport;
use App\Imports\TinhImport;
use App\Imports\HuyenImport;
use App\Imports\XaImport;

use Illuminate\Support\Facades\Auth;
use LaravelFullCalendar\Facades\Calendar;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreBed;
use App\Http\Requests\StoreRoom;
use App\Http\Requests\StoreAdmin;
use App\Http\Requests\StoreHotel;
use App\Http\Requests\StoreLocation;
use App\Repositories\Bed\BedRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Location\Xã\XãRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Repositories\Location\Tĩnh\TĩnhRepositoryInterface;
use App\Repositories\Location\Huyện\HuyệnRepositoryInterface;



class AdminController extends Controller
{
    protected $userRepo;
    protected $profileRepo;
    protected $hotelRepo;
    protected $roomRepo;
    protected $bedRepo;
    protected $tĩnhRepo;
    protected $huyệnRepo;
    protected $xãRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        ProfileRepositoryInterface $profileRepo,
        HotelRepositoryInterface $hotelRepo,
        RoomRepositoryInterface $roomRepo,
        BedRepositoryInterface $bedRepo,
        TĩnhRepositoryInterface $tĩnhRepo,
        HuyệnRepositoryInterface $huyệnRepo,
        XãRepositoryInterface $xãRepo
    ) {
        $this->middleware(['auth', 'admin', 'verified']);

        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
        $this->hotelRepo = $hotelRepo;
        $this->roomRepo = $roomRepo;
        $this->bedRepo = $bedRepo;
        $this->tĩnhRepo = $tĩnhRepo;
        $this->huyệnRepo = $huyệnRepo;
        $this->xãRepo = $xãRepo;
    }

    //********************************* SideBar *****************************************************************************************************************************/

    public function monitoring()
    {
        $users = $this->userRepo->showAll();
        $hotels = $this->hotelRepo->showAll();
        $rooms = $this->roomRepo->showall();
        $beds = $this->bedRepo->showall();
        return view('Admin.monitoring', compact('users',  'hotels', 'rooms', 'beds'));
    }


    public function calendar()
    {
        $events = [];
        $data = $this->roomRepo->calendarperYear();

        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->room_name,
                    true,
                    new \DateTime($value->date->checkin ?? ''),
                    new \DateTime($value->date->checkout ?? '' . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'route' => '#',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)->setOptions([
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
        return view('Admin.Calendar', compact('calendar'));
    }


    public function notification()
    {
        return view('Admin.notification');
    }

    //********************************* SideBar *****************************************************************************************************************************/

    //********************************* Dashboard *****************************************************************************************************************************/
    public function dashboard($date)
    {
        $busymonths = $this->roomRepo->busymonth();


        if ($date == 'Month') {
            $users = $this->userRepo->HighestPaidPerMonth();
            $rooms = $this->roomRepo->perMonth();
            return view('Admin.dashboard', compact('users', 'rooms', 'date', 'busymonths'));
        } elseif ($date == 'Year') {
            $users = $this->userRepo->HighestPaidPerYear();
            $rooms = $this->roomRepo->perYear();
            return view('Admin.dashboard', compact('users', 'rooms', 'date', 'busymonths'));
        } elseif ($date == 'Week') {
            $users = $this->userRepo->HighestPaidPerWeek();
            $rooms = $this->roomRepo->perWeek();
            return view('Admin.dashboard', compact('users', 'rooms', 'date', 'busymonths'));
        }
    }


    //********************************* Dashboard *****************************************************************************************************************************/


    //********************************* Monitoring *****************************************************************************************************************************/
    //-------------------------------------------------------------------------------USER-----------------------------------------------------------------------//
    public function users()
    {
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $users = $this->userRepo->search($search_query);
            return view('Admin.Users.lists', compact('users'));
        } else {
            $users = $this->userRepo->paginate();
            return view('Admin.Users.lists', compact('users'));
        }
    }

    public function adduser()
    {
        return view('Admin.Users.add');
    }

    public function storeuser(StoreAdmin $request)
    {
        $data = $request->validated();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role = $data['role'];
        $user->save();
        $profile = new Profile();
        $profile->username = $data['username'];
        $profile->number = $data['number'];
        $profile->dob = $data['dob'];
        $profile->place = $data['place'];
        $profile->job = $data['job'];
        $profile->blood = $data['blood'];
        $profile->relationship = $data['relationship'];
        $profile->bio = $data['bio'];
        $profile->google_plus_link = $data['google_plus_link'];
        $profile->yahoo_link = $data['yahoo_link'];
        $profile->skype_link = $data['skype_link'];
        $profile->facebook_link = $data['facebook_link'];
        $profile->twitter_link = $data['twitter_link'];
        $profile->instagram_link = $data['instagram_link'];
        $profile->user_id = $user->id;

        if ($request->hasFile('avatar_image')) {

            $extension = $data['avatar_image']->getClientOriginalExtension();
            $filename = $data['name'] . '.' . $extension;
            $path = storage_path('app/public/user/' . $data['name'] . '/image' . '/');

            $data['avatar_image']->move($path, $filename);

            $data['avatar_image'] = $filename;
            $profile->avatar_image = $data['avatar_image'];

            $profile->save();

            return redirect()->route('admin.users');
        } else {

            $profile->save();
            return redirect()->route('admin.users');
        }
    }

    public function edituser($user)
    {
        $user = $this->userRepo->showUser($user);
        return view('Admin.Users.edit', compact('user'));
    }

    public function updateuser(StoreAdmin $request, $userid, $profileid)
    {
        $data = $request->validated();

        $user = $this->userRepo->showUser($userid);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role = $data['role'];

        $profile = $this->profileRepo->showProfile($profileid);
        $profile->username = $data['username'];
        $profile->number = $data['number'];
        $profile->dob = $data['dob'];
        $profile->place = $data['place'];
        $profile->job = $data['job'];
        $profile->blood = $data['blood'];
        $profile->relationship = $data['relationship'];
        $profile->bio = $data['bio'];
        $profile->google_plus_link = $data['google_plus_link'];
        $profile->yahoo_link = $data['yahoo_link'];
        $profile->skype_link = $data['skype_link'];
        $profile->facebook_link = $data['facebook_link'];
        $profile->twitter_link = $data['twitter_link'];
        $profile->instagram_link = $data['instagram_link'];
        $profile->user_id = $user->id;

        $old_avatar_image = $profile->avatar_image;

        if ($request->hasFile('avatar_image')) {

            $extension = $data['avatar_image']->getClientOriginalExtension();
            $filename = $data['name'] . '.' . $extension;

            $path = storage_path('app/public/user/' . $data['name'] . '/image' . '/');

            $data['avatar_image']->move($path, $filename);

            if (!file_exists($path . $filename)) {

                $data['avatar_image']->move($path, $filename);
            } elseif (!file_exists($path . $old_avatar_image)) {

                $data['avatar_image']->move($path, $filename);
                unlink($path . $old_avatar_image);
            }

            $data['avatar_image'] = $filename;
            $profile->avatar_image = $data['avatar_image'];

            $profile->update();

            return redirect()->route('admin.users');
        } else {

            $profile->update();
            return redirect()->route('admin.users');
        }
    }

    public function destroyuser($user)
    {
        $this->userRepo->destroyUser($user);
        return redirect()->back();
    }
    public function restoreuser($user)
    {
        $this->userRepo->restoreUser($user);
        return redirect()->back();
    }
    //-------------------------------------------------------------------------------USER-----------------------------------------------------------------------//

    //-------------------------------------------------------------------------------HOTEL-----------------------------------------------------------------------//
    public function hotels()
    {
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $hotels = $this->hotelRepo->search($search_query);
            return view('Admin.Hotels.lists', compact('hotels'));
        } else {
            $hotels = $this->hotelRepo->paginate();
            return view('Admin.Hotels.lists', compact('hotels'));
        }
    }

    public function addhotel()
    {
        $users = $this->userRepo->showall();
        $categories = $this->categoryRepo->showall();
        return view('Admin.Hotels.add', compact('users', 'categories'));
    }

    public function storehotel(StoreHotel $request)
    {
        $data = $request->validated();

        $hotel = new Hotel();

        $hotel->hotel_name = $data['hotel_name'];
        $hotel->hotel_description = $data['hotel_description'];
        $hotel->hotel_address = $data['hotel_address'];
        $hotel->user_id = $data['user_id'];

        if ($request->hasFile('hotel_image')) {

            $extension = $data['hotel_image']->getClientOriginalExtension();
            $filename = $hotel->hotel_name . '.' . $extension;
            $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/');

            $data['hotel_image']->move($path, $filename);
        }
        $data['hotel_image'] = $filename;
        $hotel->hotel_image = $data['hotel_image'];

        $hotel->save();

        return redirect()->route('admin.hotels');
    }

    public function edithotel($hotel)
    {
        $hotel = $this->hotelRepo->showHotel($hotel);
        $users = $this->userRepo->showall();
        $categories = $this->categoryRepo->showall();
        return view('Admin.Hotels.edit', compact('hotel', 'users', 'categories'));
    }

    public function updatehotel(StoreHotel $request, $hotel)
    {
        $data = $request->validated();

        $hotel = $this->hotelRepo->showHotel($hotel);

        $hotel->hotel_name = $data['hotel_name'];
        $hotel->hotel_description = $data['hotel_description'];
        $hotel->hotel_address = $data['hotel_address'];
        $hotel->user_id = $data['user_id'];

        $old_hotel_image = $hotel->hotel_image;
        if ($request->hasFile('hotel_image')) {

            $extension = $data['hotel_image']->getClientOriginalExtension();
            $filename = $hotel->hotel_name . '.' . $extension;
            $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/');

            if (!file_exists($path . $filename)) {

                $data['hotel_image']->move($path, $filename);
            } elseif (!file_exists($path . $old_hotel_image)) {

                $data['hotel_image']->move($path, $filename);
                unlink($path . $old_hotel_image);
            }

            $data['hotel_image'] = $filename;
            $hotel->hotel_image = $data['hotel_image'];

            $hotel->save();

            return redirect()->route('admin.hotels');
        } else {
            $hotel->save();

            return redirect()->route('admin.hotels');
        }
    }

    public function destroyhotel($hotel)
    {
        $this->hotelRepo->destroyHotel($hotel);
        return redirect()->back();
    }

    public function restorehotel($hotel)
    {
        $this->hotelRepo->restoreHotel($hotel);
        return redirect()->back();
    }

    //-------------------------------------------------------------------------------HOTEL-----------------------------------------------------------------------//

    //-------------------------------------------------------------------------------ROOM-----------------------------------------------------------------------//
    public function rooms()
    {
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $rooms = $this->roomRepo->search($search_query);
            return view('Admin.Rooms.lists', compact('rooms'));
        } else {
            $rooms = $this->roomRepo->paginate();
            return view('Admin.Rooms.lists', compact('rooms'));
        }
    }

    public function addroom()
    {
        $users = $this->userRepo->showall();
        $hotels = $this->hotelRepo->showall();
        return view('Admin.Rooms.add', compact('users', 'hotels'));
    }

    public function storeroom(StoreRoom $request)
    {
        $data = $request->validated();

        $room = new Room();

        $room->room_name = $data['room_name'];
        $room->room_floor = $data['room_floor'];
        $room->room_number = $data['room_number'];
        $room->room_price = $data['room_price'];
        $room->room_type = $data['room_type'];
        $room->room_status = $data['room_status'];
        $room->room_condition = $data['room_condition'];
        $room->room_description = $data['room_description'];
        $room->user_id = $data['user_id'];
        $room->hotel_id = $data['hotel_id'];

        $room->date_start = $data['date_start'];
        $room->date_end = $data['date_end'];
        $room->time_start = $data['time_start'];
        $room->time_end = $data['time_end'];

        $hotel = $this->hotelRepo->showHotel($room->hotel_id);
        if ($request->hasFile('room_image')) {

            $extension = $data['room_image']->getClientOriginalExtension();
            $filename = $room->room_name . '.' . $extension;
            $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/' . $room->room_name . '/');

            $data['room_image']->move($path, $filename);
        }
        $data['room_image'] = $filename;
        $room->room_image = $data['room_image'];

        $room->save();

        return redirect()->route('admin.rooms');
    }

    public function editroom($room)
    {
        $room = $this->roomRepo->showRoom($room);
        $users = $this->userRepo->showall();
        $hotels = $this->hotelRepo->showall();
        return view('Admin.Rooms.edit', compact('room', 'users', 'hotels'));
    }

    public function updateroom(StoreRoom $request, $room)
    {
        $data = $request->validated();

        $room = $this->roomRepo->showRoom($room);

        $room->room_name = $data['room_name'];
        $room->room_floor = $data['room_floor'];
        $room->room_number = $data['room_number'];
        $room->room_price = $data['room_price'];
        $room->room_type = $data['room_type'];
        $room->room_status = $data['room_status'];
        $room->room_condition = $data['room_condition'];
        $room->room_description = $data['room_description'];
        $room->user_id = $data['user_id'];
        $room->hotel_id = $data['hotel_id'];

        $room->date_start = $data['date_start'];
        $room->date_end = $data['date_end'];
        $room->time_start = $data['time_start'];
        $room->time_end = $data['time_end'];

        $hotel = $this->hotelRepo->showHotel($room->hotel_id);

        $old_room_image = $room->room_image;
        if ($request->hasFile('room_image')) {

            $extension = $data['room_image']->getClientOriginalExtension();
            $filename = $room->room_name . '.' . $extension;
            $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/' . $room->room_name . '/');

            if (!file_exists($path . $filename)) {

                $data['room_image']->move($path, $filename);
            } elseif (!file_exists($path . $old_room_image)) {

                $data['room_image']->move($path, $filename);
                unlink($path . $old_room_image);
            }

            $data['room_image'] = $filename;
            $room->room_image = $data['room_image'];

            $room->save();

            return redirect()->route('admin.rooms');
        } else {
            $room->save();

            return redirect()->route('admin.rooms');
        }
    }

    public function destroyroom($room)
    {
        $this->roomRepo->destroyRoom($room);
        return redirect()->back();
    }

    public function restoreroom($room)
    {
        $this->roomRepo->restoreRoom($room);
        return redirect()->back();
    }

    //-------------------------------------------------------------------------------ROOM-----------------------------------------------------------------------//

    //-------------------------------------------------------------------------------Bed-----------------------------------------------------------------------//
    public function beds()
    {
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $beds = $this->bedRepo->search($search_query);
            return view('Admin.Beds.lists', compact('beds'));
        } else {
            $beds = $this->bedRepo->paginate();
            return view('Admin.Beds.lists', compact('beds'));
        }
    }

    public function addbed()
    {
        $rooms = $this->roomRepo->showall();
        return view('Admin.Beds.add', compact('rooms'));
    }

    public function storebed(StoreBed $request)
    {
        $data = $request->validated();

        $bed = new Bed();

        $bed->bed_name = $data['bed_name'];
        $bed->bed_type = $data['bed_type'];
        $bed->room_id = $data['room_id'];

        $room = $this->roomRepo->showRoom($bed->room_id);
        $hotel = $this->hotelRepo->showHotel($room->hotel_id);
        if ($request->hasFile('bed_image')) {

            $extension = $data['bed_image']->getClientOriginalExtension();
            $filename = $bed->bed_name . '.' . $extension;
            $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/' . $room->room_name . '/' . $bed->bed_name . '/');

            $data['bed_image']->move($path, $filename);
        }
        $data['bed_image'] = $filename;
        $bed->bed_image = $data['bed_image'];

        $room->save();

        return redirect()->route('admin.beds');
    }

    public function editbed($bed)
    {
        $bed = $this->bedRepo->showBed($bed);
        $rooms = $this->roomRepo->showall();
        return view('Admin.Beds.edit', compact('bed', 'rooms'));
    }

    public function updatebed(StoreBed $request, $bed)
    {
        $data = $request->validated();

        $bed = $this->bedRepo->showBed($bed);

        $bed->bed_name = $data['bed_name'];
        $bed->bed_type = $data['bed_type'];
        $bed->room_id = $data['room_id'];

        $room = $this->roomRepo->showRoom($bed->room_id);
        $hotel = $this->hotelRepo->showHotel($room->hotel_id);

        $old_bed_image =  $bed->bed_image;
        if ($request->hasFile('bed_image')) {

            $extension = $data['bed_image']->getClientOriginalExtension();
            $filename = $bed->bed_name . '.' . $extension;
            $path = storage_path('app/public/hotel/' . $hotel->hotel_name . '/' . $room->room_name . '/' . $bed->bed_name . '/');

            if (!file_exists($path . $filename)) {

                $data['bed_image']->move($path, $filename);
            } elseif (!file_exists($path . $old_bed_image)) {

                $data['bed_image']->move($path, $filename);
                unlink($path . $old_bed_image);
            }

            $data['bed_image'] = $filename;
            $bed->bed_image = $data['bed_image'];

            $bed->save();

            return redirect()->route('admin.beds');
        } else {
            $bed->save();

            return redirect()->route('admin.beds');
        }
    }

    public function destroybed($bed)
    {
        $this->bedRepo->destroyBed($bed);
        return redirect()->back();
    }

    public function restorebed($bed)
    {
        $this->bedRepo->restorebed($bed);
        return redirect()->back();
    }
    public function exportbed()
    {
        return Excel::download(new BedsExport, 'beds_list.csv');
    }
    //-------------------------------------------------------------------------------Bed-----------------------------------------------------------------------//
    //********************************* Monitoring *****************************************************************************************************************************/

    //********************************* Searching *****************************************************************************************************************************/
    public function searching()
    {
        if (
            isset($_GET['select_query']) or isset($_GET['select2_query']) or isset($_GET['select3_query']) or isset($_GET['tinh_query'])
            or isset($_GET['huyen_query']) or isset($_GET['xa_query'])
        ) {
            $query = $_GET['select_query'];

            $query2 = $_GET['select2_query'];

            $query3 = $_GET['select3_query'];
            $query4 = $_GET['tinh_query'];
            $query5 = $_GET['huyen_query'];
            $query6 = $_GET['xa_query'];

            if ($query == 'Tĩnh') {
                $tinhs = Tĩnh::OfName($query4);
                $huyens = $this->huyệnRepo->huyens();
                $xas = $this->xãRepo->xas();
                return view('Admin.Location.search', compact('tinhs', 'huyens', 'xas'));
            } elseif ($query == 'Huyện') {
                $tinhs = $this->tĩnhRepo->tinhs();
                $huyens = Huyện::OfAll($query2, $query5);
                $xas = $this->xãRepo->xas();
                return view('Admin.Location.search', compact('tinhs', 'huyens', 'xas'));
            } elseif ($query == 'Xã') {
                $tinhs = $this->tĩnhRepo->tinhs();
                $huyens = $this->huyệnRepo->huyens();
                $xas = Xã::OfAll($query2, $query3, $query4, $query5 . $query6);
                return view('Admin.Location.search', compact('tinhs', 'huyens', 'xas'));
            }
        } else {
            $tinhs = $this->tĩnhRepo->tinhs();

            $huyens = $this->huyệnRepo->huyens();
            $xas = $this->xãRepo->xas();
            return view('Admin.Location.search', compact('tinhs', 'huyens', 'xas'));
        }
    }

    public function load_more(Request $request)
    {
        $output = '';
        $id = $request->id;
        dd( $id);
        $tinhs = Tĩnh::where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        if (!$tinhs->isEmpty()) {
            foreach ($tinhs as $tinh) {
                $id = $tinh->id;
                $created_at = $tinh->created_at;
                $output .= '<table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">' . $tinh->id . '</th>
                    <td>' . $tinh->tinh_name . '</td>
                    <td>' . $tinh->tinh_description . '</td>
                  </tr>
                </tbody>
              </table>';
            }
            $output .= '<div id="remove-row" class="text-center">
    <button id="btn-more" data-id="' . $tinh->id . '" class="loadmore-btn text-center">Load More</button>
    </div>';
            echo $output;
        }
    }

    public function location_create()
    {
        $locations = $this->tĩnhRepo->showAll();
        return view('Admin.Location.create', compact('locations'));
    }

    public function location_store(StoreLocation $request)
    {
        $data = $request->validated();

        $tinh = new Tĩnh;
        $tinh->tinh_name = $data['tinh_name'];
        $tinh->tinh_description = $data['tinh_description'];
        $tinh->save();
        $tinhid = $tinh->id;

        $huyen = new Huyện;
        $huyen->huyen_name = $data['huyen_name'];
        $huyen->huyen_description = $data['huyen_description'];
        $huyen->tĩnh_id = $tinhid;
        $huyen->save();
        $huyenid = $huyen->id;

        $xa = new Xã;
        $xa->xa_name = $data['xa_name'];
        $xa->xa_description = $data['xa_description'];
        $xa->tĩnh_id = $tinhid;
        $xa->huyện_id = $huyenid;
        $xa->save();

        return redirect()->route('admin.searching');
    }



    public function Tinhimport(Request $request)
    {
        $file = $request->file('excel');
        Excel::import(new TinhImport, $file);
        return redirect()->back();
    }

    public function Huyenimport(Request $request)
    {
        $file = $request->file('excel');
        Excel::import(new HuyenImport, $file);
        return redirect()->back();
    }

    public function Xaimport(Request $request)
    {
        $file = $request->file('excel');
        Excel::import(new XaImport, $file);
        return redirect()->back();
    }
    //********************************* Searching *****************************************************************************************************************************/
}
