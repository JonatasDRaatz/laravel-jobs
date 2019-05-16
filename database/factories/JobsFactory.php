<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Job::class, function (Faker $faker) {
    return [
        'title'=> $faker->jobTitle,
        'section_id'=> function () { 
            return App\Section::inRandomOrder()->first()->id;
        },
        'admin_id'=> function () { 
            return App\Admin::inRandomOrder()->first()->id;
        },
        'description'=> $faker->randomHtml(2,2),


    ];
});
