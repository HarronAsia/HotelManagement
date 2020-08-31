<?php

namespace App\Exports;

use App\Models\Location\Xã;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class XasExport implements FromView
{
    public function view(): View
    {
        return view(
            'Admin.Location.Export.xas_excel',
            [
                'xas' => Xã::query()
                    ->join('tĩnhs', 'xãs.tĩnh_id', 'tĩnhs.id')
                    ->join('huyệns', 'xãs.huyện_id', 'huyệns.id')
                    ->select([
                        'tĩnhs.tinh_name', 'tĩnhs.tinh_description',
                        'huyệns.huyen_name', 'huyệns.huyen_description',
                        'xãs.tĩnh_id','xãs.huyện_id', 'xãs.xa_name', 'xãs.xa_description', 'xãs.created_at', 'xãs.updated_at', 'xãs.deleted_at'
                    ])
                    ->limit(3000)
                    ->get()
            ]
        );
    }
}
