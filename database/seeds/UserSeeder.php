<?php

use App\Model\User;
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
            'estado' => 1,
            'phone' => 43239109,
            'password' => bcrypt('123456'),
            'foto' => '/uploads/avatars/default.jpg',
            'role_id' => rand(1,4),
            // 'foto' => $faker->imageUrl($width = 200, $height = 200),
            // 'direccion' => 'Oquendo #1233',
        ]);
        // factory(User::class)->create([
        //     'role_id' => $roleId
        // ]);
        factory(User::class, 12)->create();
    }
}
