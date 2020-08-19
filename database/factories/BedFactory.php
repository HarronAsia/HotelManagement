<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bed;
use Faker\Generator as Faker;

$factory->define(Bed::class, function (Faker $faker) {
    static $number2 = 1;
    return [
        'bed_name' => $faker->name,
        'bed_type' => $faker->randomElement(['Single Bed','Double Bed','Queen Size Bed','King size Bed','Super Kind Size Bed','California king bed','Extra bed' ]),
        'room_id' => $number2++,
    ];
});
