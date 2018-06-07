<?php

use App\Model\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::create([
            'mesa'=>"mesa 1",
            'estado_pedido'=> 0,            
            'total'=> 25
           ]);
        Pedido::create([
            'mesa'=>"mesa 2",
            'estado_pedido'=> 0,            
            'total'=> 92
        ]);
        Pedido::create([
            'mesa'=>"mesa 3",
            'estado_pedido'=> 0,            
            'total'=> 70
        ]);
        Pedido::create([
            'mesa'=>"mesa 4",
            'estado_pedido'=> -1,            
            'total'=> 155
        ]);
        Pedido::create([
            'mesa'=>"mesa 1",
            'estado_pedido'=> -1,            
            'total'=> 200
        ]);
        Pedido::create([
            'mesa'=>"mesa 3",
            'estado_pedido'=> -1,            
            'total'=> 100
        ]);       
           
    }
}
