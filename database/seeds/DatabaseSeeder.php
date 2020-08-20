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
        factory(Region::class, 6)->create();
        factory(Category::class, 23)->create();
        factory(Hotel::class, 100)->create();
        factory(Room::class, 100)->create();
        factory(Bed::class, 100)->create();
        factory(Booking_Date::class, 1000)->create();
        // for ($user = 0; $user < 2; $user++) {
        //     factory(User::class, 500)->create();
        // }
        // for ($user = 0; $user < 2; $user++) {
        //     factory(Profile::class, 500)->create();
        // }

        // factory(Region::class, 6)->create();
        // factory(Category::class, 7)->create();

        // for ($user = 0; $user < 2; $user++) {
        //     factory(Hotel::class, 500)->create();
        // }
        // for ($user = 0; $user < 2; $user++) {
        //     factory(Room::class, 500)->create();
        // }
        // for ($user = 0; $user < 2; $user++) {
        //     factory(Bed::class, 500)->create();
        // }





    }
}
