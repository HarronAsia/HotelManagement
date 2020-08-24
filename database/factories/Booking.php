<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Booking_Date;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Booking_Date::class, function (Faker $faker) {
    $date = new Carbon();
    return [
        'checkin' => $date->addDays(mt_rand(1,31)),
        'checkout' => $date->addDays(mt_rand(1,31)),
        'time_begin' => $date->addHour(mt_rand(1,24)),
        'time_end' => $date->addHour(mt_rand(1,24)),
        'bookable_type'=>'App\Models\Room',
        'bookable_id'=> rand(1,10000),
        'user_id'=> rand(1,100)
        
    ];
});
