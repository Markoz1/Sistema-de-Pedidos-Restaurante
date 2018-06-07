<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class MesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'Mesa 1',
            'username' => 'Mesa1',
            'password' => bcrypt('Mesa1'),
            'estado' => '1',
            'role_id' => '5'
        ]);
        User::create([
            'nombre' => 'Mesa 2',
            'username' => 'Mesa2',
            'password' => bcrypt('Mesa2'),
            'estado' => '1',
            'role_id' => '5'
        ]);
        User::create([
            'nombre' => 'Mesa 3',
            'username' => 'Mesa3',
            'password' => bcrypt('Mesa3'),
            'estado' => '1',
            'role_id' => '5'
        ]);
        User::create([
            'nombre' => 'Mesa 4',
            'username' => 'Mesa4',
            'password' => bcrypt('Mesa4'),
            'estado' => '1',
            'role_id' => '5'
        ]);
        User::create([
            'nombre' => 'Mesa 5',
            'username' => 'Mesa5',
            'password' => bcrypt('Mesa5'),
            'estado' => '1',
            'role_id' => '5'
        ]);
        User::create([
            'nombre' => 'Mesa 6',
            'username' => 'Mesa6',
            'password' => bcrypt('Mesa6'),
            'estado' => '1',
            'role_id' => '5'
        ]);
        User::create([
            'nombre' => 'Mesa 7',
            'username' => 'Mesa7',
            'password' => bcrypt('Mesa7'),
            'estado' => '1',
            'role_id' => '5'
        ]);
    }
}
