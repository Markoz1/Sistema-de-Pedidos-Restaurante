<?php

use App\Model\User;
use App\Model\Cuenta;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id	estado	total	recibido	cambio	cliente_id	users_id	created_at	updated_at

        //seeder de prueba, creando una cuenta para el cliente de id=1 y la mesa 1
        Cuenta::create([
            'estado' => '0',
            'cliente_id' => '1',
            'users_id' => '4'
        ]);
        $mesa = User::find(4);
        $mesa->estado = 0;
        $mesa->save();
    }
}
