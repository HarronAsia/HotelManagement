<?php

namespace App\Exports;

use App\Models\Region;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RegionsExport implements FromView
{
    public function view(): View
    {
        return view('Admin.Regions.regions_excel',
        [
            'regions' => Region::all()
        ]);
    }
}
