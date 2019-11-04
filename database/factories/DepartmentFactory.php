<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'government_body_id' => factory(\App\GovernmentBody::class)->create()->id
    ];
});



