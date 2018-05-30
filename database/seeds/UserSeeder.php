<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'nombre' => 'John Doe',
            'phone' => 43239109,
            'password' => bcrypt('laravel'),
            // 'foto' => $faker->imageUrl($width = 200, $height = 200),
            // 'direccion' => 'Oquendo #1233',
        ]);
        // factory(User::class)->create([
        //     'role_id' => $roleId
        // ]);
        factory(User::class, 12)->create();
    }
}
