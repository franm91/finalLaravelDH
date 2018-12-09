<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
      'title' => $faker->town,
      'text' => $faker->text
    ];
});
