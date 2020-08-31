<?php

namespace App\Exports;

use App\Models\Location\Tĩnh;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TinhsExport implements FromView
{
    public function view(): View
    {
        return view('Admin.Location.Export.tinhs_excel',
        [
            'tinhs' => Tĩnh::all()
        ]);
    }
}
