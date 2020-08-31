<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Location\Xa;
use Faker\Generator as Faker;

$factory->define(Xa::class, function (Faker $faker) {
    static $number = 1;
    static $number2 = 1;
    return [
        'xa_name' => 'Xã ' . $number++,
        'xa_description' => 'Chú thích về Xã ' . $number2++,
        'huyen_id' => rand(1,1000),
    ];
});
