<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [       
            'category_id' => 1,
            'name' => $faker->name,
            'description' => $faker->text,
            'content' => $faker->text,
            'image' => $faker->name,
            'price' => $faker->randomNumber(2),
            'metric' => $faker->name,
            'brand' => $faker->name,
            'color' => $faker->colorName,
            'datasheet' => $faker->text,
            'stock' => $faker->numberBetween(10,20),
            'stock_min' => $faker->numberBetween(20,30),
            'state' => 0,
    ];
});
