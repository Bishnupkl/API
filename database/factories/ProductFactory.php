<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail'=>$faker->paragraph,
        'stock'=>$faker->randomDigit,
        'price' => $faker->numberBetween(100, 1000),
        'discount'=>$faker->numberBetween(2,30),
    ];
});
