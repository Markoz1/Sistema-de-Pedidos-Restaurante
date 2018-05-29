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
            'password' => '123456',
            'estado' => '1',
            'role_id' => '1'
        ]);
        User::create([
            'nombre' => 'nombre cocinero',
            'username' => 'cocinero',
            'password' => '123456',
            'estado' => '1',
            'role_id' => '2'
        ]);
        User::create([
            'nombre' => 'mesa 1',
            'username' => 'mesa1',
            'password' => '123456',
            'estado' => '1',
            'role_id' => '5'
        ]);
    }
}
