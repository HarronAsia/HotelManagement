<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Models\User\User;
use App\Models\User\Profile;
use App\Models\Hotel;
use App\Models\Room\Room;
use App\Models\Room\Bed;
use App\Models\Room\Booking_Date;
use App\Models\Location\Tĩnh;
use App\Models\Location\Huyện;
use App\Models\Location\Xã;

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

        DB::table('users')->insert(
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => bcrypt('123123123'),
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
                'role' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        
        DB::table('users')->insert(
            [
                'name' => 'test2',
                'email' => 'test2@gmail.com',
                'password' => bcrypt('123123123'),
                'email_verified_at' => NULL,
                'remember_token' => Str::random(10),
                'role' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        
        
        factory(User::class, 98)->create();
        factory(Profile::class, 101)->create();
        factory(Hotel::class, 3)->create();
        DB::table('rooms')->insert(
            [
                'room_name' => 'Admin Room',
                'room_floor' =>'1',
                'room_number' => '9999',
                'room_price' => '999999',
                'room_type' => 'Single',
                'room_condition' => 'Available',
                'room_status' => 'Verified',
                'room_description' => 'aaaaaaa',
                'booking_time' => rand(1,1000),
                'user_id' => '1',
                'hotel_id' => rand(1,3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        factory(Room::class, 999)->create();
        factory(Bed::class, 1000)->create();
        factory(Booking_Date::class, 10000)->create();
        factory(Tĩnh::class, 64)->create();
        factory(Huyện::class, 1000)->create();
        factory(Xã::class, 10000)->create();
    }
}
