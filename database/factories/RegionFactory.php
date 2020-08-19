<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Region;
use Faker\Generator as Faker;

$factory->define(Region::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->randomElement([
            'New Region 1',
            'New Region 2',
            'New Region 3',
            'New Region 4',
            'New Region 5',
            'New Region 6',
        ])
    ];
});
