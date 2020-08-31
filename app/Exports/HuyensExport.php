<?php

namespace App\Exports;

use App\Models\Location\Huyện;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HuyensExport implements FromView 
{
    public function view(): View
    {
        return view(
            'Admin.Location.Export.huyens_excel',
            [

                'huyens' => Huyện::query()
                    ->join('tĩnhs', 'huyệns.tĩnh_id', 'tĩnhs.id')
                    ->select(['tĩnhs.tinh_name','tĩnhs.tinh_description','huyệns.id','huyệns.tĩnh_id','huyệns.huyen_name','huyệns.huyen_description','huyệns.created_at','huyệns.updated_at','huyệns.deleted_at'])
                    ->get()
            ]
        );
    }
}
