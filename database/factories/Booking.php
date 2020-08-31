<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Room\Booking_Date;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Faker\Provider\DateTime;

$factory->define(Booking_Date::class, function (Faker $faker) {

    return [
        'checkin' => DateTime::dateTimeThisYear(),
        'checkout' => DateTime::dateTimeThisYear(),
        // 'time_begin' => $date->addHour(mt_rand(1,12)),
        // 'time_end' => $date->addHour(mt_rand(13,24)), 
        'bookable_id'=> rand(1,10000),
        'bookable_type'=> 'App\Models\Room\Room',
        'user_id'=> rand(1,100)
        
    ];
});
