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
       
        'bookable_id'=> rand(1,10000),
        'bookable_type'=> 'App\Models\Room\Room',
        'user_id'=> rand(1,100)
        
    ];
});
