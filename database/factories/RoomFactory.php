<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'room_name' => $faker->name,
        'room_floor' =>rand(1,11),
        'room_number' => $faker->unique()->numberBetween(1,1000000),
        'room_price' => number_format($faker->numberBetween(1,100000), 2, ',', ' '),
        'room_type' => $faker->randomElement(['Single','Couple','Three or Four People','Family','Business','For Disabled']),
        'room_condition' => $faker->randomElement(['Available','Occupied','Complimentary','Stay Over','On-change','Do Not Disturb','Sleep-out','Skipper','Sleeper','Vacant and ready','Out-of-order','Double Lock','Lockout','Due out','Do Not Paid','Checkout','Late Check-out']),
        'room_status' => $faker->randomElement(['Verified','Pending','Blocked']),
        'room_description' => $faker->paragraph,
        'user_id' => rand(1,1000),
        'hotel_id' => rand(1,1000),

        'date_start'=>$faker->date,
        'date_end'=>$faker->date,
        'time_start'=>$faker->time,
        'time_end'=>$faker->time,
    ];
});
