<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Booking_Date;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Booking_Date::class, function (Faker $faker) {
    $date = new Carbon();
    return [
        // 'checkin'=>$faker->unique()->dateTimeBetween('2020-01-01','2020-05-31')->format('Y-m-d '),
        // 'checkout'=>$faker->unique()->dateTimeBetween('2020-06-01','2020-12-31')->format('Y-m-d '),
        // 'time_begin'=>$faker->unique()->dateTimeBetween('01:01:01','12:59:59')->format('H:i:s'),
        // 'time_end'=>$faker->unique()->dateTimeBetween('13:01:01','24:59:59')->format('H:i:s'),
        'checkin' => $date->addDays(mt_rand(1,31)),
        'checkout' => $date->addDays(mt_rand(1,31)),
        'time_begin' => $date->addHour(mt_rand(1,24)),
        'time_end' => $date->addHour(mt_rand(1,24)),
        'bookable_type'=>'App\Models\Room',
        'bookable_id'=> rand(1,100),
        'user_id'=> rand(1,100)
        
    ];
});
