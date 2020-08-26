<?php

namespace App\Http\Controllers;

use App\Models\Location\Tĩnh;

use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Bed\BedRepositoryInterface;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $roomRepo;
    protected $bedRepo;

    public function __construct(RoomRepositoryInterface $roomRepo, BedRepositoryInterface $bedRepo)
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
        return view('home', compact('rooms', 'beds'));
    }


    public function test()
    {
        return view('homework.test');
    }

    public function test2()
    {
        return view('homework.test2');
    }

    public function loadmoredata(Request $request)
    {
        $output = '';
        $id = $request->id;

        $tinhs = Tĩnh::where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
            
        if (!$tinhs->isEmpty()) {
            foreach ($tinhs as $tinh) {
                $id = $tinh->id;
                $created_at=$tinh->created_at; 
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
}
