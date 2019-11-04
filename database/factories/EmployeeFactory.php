<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
       'image'=>$faker->image('storage/app/public/store',400,300,false),
       'department_id' => factory(\App\Department::class)->create()->id
    ];
});

  
