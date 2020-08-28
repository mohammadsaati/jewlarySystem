<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Temp;
use App\User;
use Faker\Generator as Faker;

$factory->define(Temp::class, function (Faker $faker) {
    return [
        'weight' => $faker->numberBetween(1,20),
        'ayar' => 18,
        'fi' => $faker->numberBetween(1000000 , 4000000),
        'price' => $faker->numberBetween(2000000 , 100000000),
        'product_info' => $faker->sentence(),
        'type' => 'طلا',
        'user_id' => User::all()->random()->id
    ];
});
