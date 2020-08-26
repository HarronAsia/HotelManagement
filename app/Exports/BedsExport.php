<?php

namespace App\Exports;

use App\Models\Room\Bed;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BedsExport implements FromView
{
     public function view(): View
    {
        return view('Admin.Beds.beds_excel',
        [
            'beds' => Bed::all()
        ]);
    }
}
