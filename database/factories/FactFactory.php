<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Fact;
use Faker\Generator as Faker;

$factory->define(Fact::class, function (Faker $faker) {
    return [
        'text' => $faker->realText()
    ];
});
