<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CategoriesExport implements FromView
{
    public function view(): View
    {
        return view('Admin.Categories.categories_excel',
        [
            'categories' => Category::all()
        ]);
    }
}
