<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Booking_Date;
use Faker\Generator as Faker;

$factory->define(Booking_Date::class, function (Faker $faker) {
    
    return [
        'checkin'=>$faker->dateTimeBetween('2020-01-01','2020-05-31')->format('Y-m-d '),
        'checkout'=>$faker->dateTimeBetween('2020-06-01','2020-12-31')->format('Y-m-d '),
        'time_begin'=>$faker->dateTimeBetween('01:01:01','12:59:59')->format('H:i:s'),
        'time_end'=>$faker->dateTimeBetween('13:01:01','24:59:59')->format('H:i:s'),
        'bookable_type'=>'App\Models\Room',
        'bookable_id'=> rand(1,100),
        'user_id'=> rand(1,100)
        
    ];
});
