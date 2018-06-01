<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // solo es para probar autenticación
        User::create([
            'nombre' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'estado' => '1',
            'role_id' => '1'
        ]);
        User::create([
            'nombre' => 'nombre cocinero',
            'username' => 'cocinero',
            'password' => bcrypt('123456'),
            'estado' => '1',
            'role_id' => '2'
        ]);
    }
}
