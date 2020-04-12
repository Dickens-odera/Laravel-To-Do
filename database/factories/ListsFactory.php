<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lists;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Lists::class, function (Faker $faker) {
    return [
        'task'=>$faker->name,
        'description'=>$faker->text,
        'isComplete'=>$faker->boolean(false)
    ];
});
