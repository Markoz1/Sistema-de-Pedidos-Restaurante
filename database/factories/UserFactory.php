<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\User::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'phone' => $faker->numberBetween($min = 11111111, $max = 99999999),
        'direccion' => $faker->address,
        'username' => $faker->userName,
        'foto' => $faker->imageUrl($width = 200, $height = 200),
        // 'ci' => $faker->unique()->randomNumber,
        'ci' => $faker->unique()->numberBetween($min = 11111111, $max = 99999999),
        'estado' => $faker->randomElement([0,1]),
        'role_id' => rand(1,3),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
