<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    static $number = 1;
    return [
        'username' => $faker->userName,
        'number' => $faker->phoneNumber,
        'dob' => Carbon::now(),
        'gender' => $faker->randomElement(['Male','Female','Not Sure']),
        'place' => $faker->address,
        'job' => $faker->jobTitle,
        'bio' => $faker->paragraph,
        'user_id' => $number++,
    ];
});
