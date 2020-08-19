<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hotel;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        
        'hotel_name' => $faker->unique()->name,
        'hotel_description' => $faker->sentence(),
        'hotel_address' => $faker->address,
        'user_id' => rand(1,1000),
        'category_id' => rand(1,24),
        'region_id' => rand(1,6),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    
    ];
});
