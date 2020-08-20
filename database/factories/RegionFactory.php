<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Region;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;

$factory->define(Region::class, function (Faker $faker) {
    static $number = 1;
    static $number2 = 1;

    $filepath = storage_path('app/public/region/New Region'.$number2++.'/');

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }
    return [
        'title' => 'New Region'.$number++,
        // 'banner'=> $faker->image($filepath,640,480, null, false),
    ];
});
