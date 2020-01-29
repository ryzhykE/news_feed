<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Article::class, function (Faker $faker) {
    return [
        'slug' => $faker->unique()->slug(2),
        'title' => $faker->words(2, true),
        'text' => $faker->realText(1000),
        'created_at' => $faker->dateTimeBetween('-10 days', 'now'),
        'category_id' => function() {
            return factory(\App\Model\Category::class)->create()->id;
        },
    ];
});
