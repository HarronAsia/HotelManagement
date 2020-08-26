<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Location\Huyện;
use Faker\Generator as Faker;

$factory->define(Huyện::class, function (Faker $faker) {
    static $number = 1;
    static $number2 = 1;
    return [
        'huyen_name' => 'Huyện ' . $number++,
        'huyen_description' => 'Chú thích về Huyện ' . $number2++,
        'tĩnh_id' => rand(1,64),
    ];
});
