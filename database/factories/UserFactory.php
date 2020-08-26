<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'email_verified_at' => Carbon::now(),
        'remember_token' => Str::random(10),
        'role' => 'user',
    ];
});
