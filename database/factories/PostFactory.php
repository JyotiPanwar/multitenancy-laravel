<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Customer\Post::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'body' => $faker->text(100),
    ];
});