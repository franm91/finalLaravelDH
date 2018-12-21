<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
      'title' => $faker->name,
      'text' => $faker->text,
      'user_id' => App\User::all()->random()->id,
      'country' => $faker->country
    ];
});
