<?php

namespace App\Exports;

use App\Models\User\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public function view(): View
    {
        return view('Admin.Users.users_excel',
        [
            'users' => User::all()
        ]);
    }
}
