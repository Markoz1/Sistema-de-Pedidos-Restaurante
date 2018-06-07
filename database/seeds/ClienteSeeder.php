<?php
use App\Model\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Cliente::create([
            'nombre'=> "pedro camacho",            
            'nit'=> "123221222",
            'telefono'=> "73788767",
            'direccion'=> "av america #343"
           ]);
            Cliente::create([
            'nombre'=> "juan perez",            
            'nit'=> "8977789",
            'telefono'=> "44345678",
            'direccion'=> "av blanco galindo km 3"
           ]);
            Cliente::create([
            'nombre'=> "adrian espinoza",            
            'nit'=> "333333",
            'telefono'=> "44265647",
            'direccion'=> "av blanco galindo km 10"
           ]);     
        Factory(Cliente::class,15)->create();       
    }
}
