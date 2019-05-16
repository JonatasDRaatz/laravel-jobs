<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        'name'=> $faker->firstName,
        'last_name'=> $faker->lastName,
        'user_id'=> function () { 
            return App\User::inRandomOrder()->first()->id;
        }, 
        'description'=> $faker->text,
        'picture'=>'placeholder.jpg',
        'file'=>'placeholder.pdf'
    ];
});
