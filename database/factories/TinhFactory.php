<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Location\Tinh;
use Faker\Generator as Faker;

$factory->define(Tinh::class, function (Faker $faker) {
    static $number =1;
    static $number2 =1;
    return [
        'tinh_name'=> 'Tỉnh ' .$number++,
        'tinh_description'=> 'Chú thích về Tỉnh ' .$number2++,
    ];
});
