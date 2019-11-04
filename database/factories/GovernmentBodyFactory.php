<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\GovernmentBody;
use Faker\Generator as Faker;

$factory->define(GovernmentBody::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name
    ];
});


