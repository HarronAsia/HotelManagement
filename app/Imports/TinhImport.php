<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TinhImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            
            if ($key > 0) {
                //dd($value);
                DB::table('tĩnhs')->insert(['name' => $value[1], 
                'description' => $value[2], 
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL]);
            }
        }
    }
}
