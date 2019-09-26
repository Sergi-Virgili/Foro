<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Theme;
use App\User;
use App\Response;
use Faker\Generator as Faker;

$factory->define(Response::class, function (Faker $faker) {
    return [
        'theme_id' => Theme::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'content' => Str::random(5),
    ];  
});
