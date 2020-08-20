<?php

namespace App\Exports;


use App\Models\Hotel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HotelsExport implements FromView
{
    public function view(): View
    {
        return view('Admin.Hotels.hotels_excel',
        [
            'hotels' => Hotel::all()
        ]);
    }
}
