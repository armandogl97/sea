<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Project;

$factory->define(Project::class, function (Faker $faker) {
    return [      
        'name_problem' =>$faker->sentence(5),
        'desc_problem' =>$faker->text
    ];
});
