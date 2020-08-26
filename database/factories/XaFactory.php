<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Location\Xã;
use Faker\Generator as Faker;

$factory->define(Xã::class, function (Faker $faker) {
    static $number = 1;
    static $number2 = 1;
    return [
        'xa_name' => 'Xã ' . $number++,
        'xa_description' => 'Chú thích về Xã ' . $number2++,
        'tĩnh_id' => rand(1,64),
        'huyện_id' => rand(1,1000),
    ];
});
