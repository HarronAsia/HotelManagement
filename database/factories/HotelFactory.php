<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hotel;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    static $number = 1;
    return [
        
        'hotel_name' => 'Hotel'.$number++,
        'hotel_description' => $faker->sentence(),
        'hotel_address' => $faker->address,
        'user_id' => rand(1,100),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    
    ];
});
