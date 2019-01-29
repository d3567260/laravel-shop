<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $image = $faker->randomElement([
        "images/test01.jpeg",
        "images/test02.jpeg",
        "images/test03.jpeg",
        "images/test04.jpeg",
        "images/test05.jpeg",
        "images/test06.jpeg",
        "images/test07.jpeg",
        "images/test08.jpeg",
    ]);
    return [
        'title'        => $faker->word,
        'description'  => $faker->sentence,
        'image'        => $image,
        'on_sale'      => true,
        'rating'       => $faker->numberBetween(0, 5),
        'sold_count'   => 0,
        'review_count' => 0,
        'price'        => 0,
    ];
});
