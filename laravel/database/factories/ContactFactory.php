<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'subject' => $faker->sentence,
        'message' => $faker->paragraph,
        'read' => $faker->boolean

    ];
});
