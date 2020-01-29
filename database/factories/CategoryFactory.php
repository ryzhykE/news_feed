<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, true),
        'slug' => $faker->unique()->slug(2),
    ];
});
