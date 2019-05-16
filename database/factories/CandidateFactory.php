<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Candidate::class, function (Faker $faker) {
    return [
        'profile_id'=> function () { 
            return App\Profile::inRandomOrder()->first()->id;
        },
        'job_id'=> function () { 
            return App\Job::inRandomOrder()->first()->id;
        }, 
    ];
});
