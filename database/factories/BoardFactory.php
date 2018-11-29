<?php

use Faker\Generator as Faker;
use App\Board;

$factory->define(Board::class, function (Faker $faker) {
    return [
        'Title'=>$faker->word, 
        'Writer'=>$faker->userName, 
        'Content'=>$faker->sentence,
    ];
});
