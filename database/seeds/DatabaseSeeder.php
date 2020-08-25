<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\Profile;
use App\Models\Region;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Bed;
use App\Models\Booking_Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit',-1);
        DB::table('users')->insert(
            [
                'name' => 'harron',
                'email' => 'harron@gmail.com',
                'password' => bcrypt('123123123'),
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        
        factory(User::class, 100)->create();
        factory(Profile::class, 101)->create();
        factory(Hotel::class, 3)->create();
        factory(Room::class, 10000)->create();
        factory(Bed::class, 10000)->create();
        factory(Booking_Date::class, 20000)->create();
        




    }
}
