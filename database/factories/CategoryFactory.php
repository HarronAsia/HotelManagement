<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->randomElement([
            'Hotels',
            'Apartments',
            'Resorts',
            'Villas',
            'Cabins',
            'Cottages',
            'Glamping',
            'Serviced apartments',
            'Holiday homes',
            'Guest houses',
            'Hotels',
            'Motels',
            'B&Bs',
            'Ryokans',
            'Riads',
            'Holiday parks',
            'Homestays',
            'Campsites',
            'Country houses',
            'Farm stays',
            'Boats',
            'Luxury tents',
            'Self catering accommodation',
            'Tiny houses',
        ])
    ];
});
