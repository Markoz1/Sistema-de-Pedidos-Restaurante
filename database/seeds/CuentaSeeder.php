<?php

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
        //seeder de prueba, creando una cuenta para el cliente de id=1
        Cuenta::create([
            'estado' => '0',
            'cliente_id' => '1',
        ]);
    }
}
