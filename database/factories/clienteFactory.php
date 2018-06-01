<?php
use App\Model\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text(30),
        'nit' => $faker->unique()->numberBetween($min = 11111111, $max = 99999999),
        'telefono' => '4' . $faker->numberBetween($min = 000000, $max = 999999),
        'direccion' => $faker->sentence(4),
    ];
});
