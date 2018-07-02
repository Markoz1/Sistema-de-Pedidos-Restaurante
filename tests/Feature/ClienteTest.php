<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\User;
use App\Model\Cliente;

class ClienteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function acceder_a_cliente_como_administrador()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
             ->get('/clientes')
             ->assertStatus(200)
             ->assertSee('Clientes');          
    }
     /**
     * @test
     */
    public function crear_nuevo_cliente(){
        
        $this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->json('POST', '/clientes', [
                    'nombre' => 'juan pablo',
                    'nit' => '212203'
                    ])->assertRedirect('/clientes');
            
            $this->assertDatabaseHas('cliente',[
                'nombre' => 'juan pablo',
                    'nit' => '212203'
            ]);
    }
     /**
     * @test
     */

    public function Actualizar_cliente(){
        
        //$this->withoutExceptionHandling();
        
        $cliente = Cliente::find(5);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->put("/clientes/{$cliente->cliente_id}",[
                'nombre' => 'juanito',
                'nit' => '123456789'
            ])->assertRedirect('clientes');
        
        $this->assertDatabaseHas('cliente',[
            'nombre' => 'juanito',
            'nit' => '123456789'
        ]);
    }
}
