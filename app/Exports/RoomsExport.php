<?php

namespace App\Exports;

use App\Models\Room\Room;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RoomsExport implements FromView
{
    public function view(): View
    {
        return view('Admin.Rooms.rooms_excel',
        [
            'rooms' => Room::all()
        ]);
    }
}
