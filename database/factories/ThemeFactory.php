<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use App\User;
use App\Theme;
use Faker\Generator as Faker;


$factory->define(Theme::class, function (Faker $faker) {
    return [
            'title' => $faker->sentence,
            'content' => $faker->text,
            'user_id' => User::all()->random()->id,
            'area_id' => Area::all()->random()->id,
        ];  
    });