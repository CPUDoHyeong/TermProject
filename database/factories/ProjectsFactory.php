<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $min = App\User::min('id');
    $max = App\User::max('id');
    return [
        //
        'user_id' => $faker->numberBetween($min, $max),
        'name' => $faker->word,
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});
