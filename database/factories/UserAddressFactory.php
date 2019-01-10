<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserAddress::class, function (Faker $faker) {
    $addresses = [
        ["臺北市", "中正區"],
        ["新北市", "板橋區"],
        ["桃園市", "桃園區"],
        ["臺中市", "中區"],
        ["臺南市", "東區"],
        ["高雄市", "鹽埕區"],
    ];

    $address = $faker->randomElement($addresses);

    return [
        'province'      => '',
        'city'          => $address[0],
        'district'      => $address[1],
        'address'       => $faker->streetAddress,
        'zip'           => $faker->numberBetween(100, 999),
        'contact_name'  => $faker->name,
        'contact_phone' => $faker->phoneNumber,
    ];
});
