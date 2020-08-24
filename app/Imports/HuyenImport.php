<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HuyenImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {

            if ($key > 0) {
                
                DB::table('huyệns')->insert([
                    'name' => $value[1],
                    'tĩnh_id' => $value[2],
                    'description' => $value[3],

                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => NULL
                ]);
            }
        }
    }
}
