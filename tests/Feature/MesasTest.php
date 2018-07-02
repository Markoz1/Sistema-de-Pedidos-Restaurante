<?php

namespace Tests\Feature;

use App\Model\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MesasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function acceder_a_mesas_como_administrador()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->get('/mesas')
            ->assertStatus(200)
            ->assertSee('Mesas');          
    }
    /**
     * A basic test example.
     *
     * @test
     */
    public function acceder_a_mesas_como_cajero()
    {
        $user = User::find(3);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'cajero'])
            ->get('/mesas')
            ->assertStatus(200)
            ->assertSee('Reserva de Mesas');          
    }
    /**
     * @test
     */
    public function crear_nueva_mesa(){
        
        $this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->json('POST', '/mesas', [
                    'nombre' => 'Mesa',
                    'numero' => '8'
                    ])
                    ->assertRedirect('/mesas');
            
            $this->assertDatabaseHas('users',[
                'nombre' => 'Mesa 8'
            ]);
    }
    /**
     * @test 
     * */
    public function validaciones_numero_existente_test(){
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/mesas')
                ->post('/mesas',[
                    'nombre' => 'Mesa',
                    'numero' => '1'])
                ->assertRedirect('/mesas')
                ->assertSessionHasErrors(['numero']);
    }
    /**
     * @test 
     * */
    public function validaciones_crear_con_letra_en_numero_test(){
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/mesas')
                ->post('/mesas',[
                    'nombre' => 'Mesa',
                    'numero' => 'primera'])
                ->assertRedirect('/mesas')
                ->assertSessionHasErrors(['numero']);
            
            $this->assertDatabaseMissing('users',[
                'nombre' => 'Mesa Primera'
            ]);
    }
    /**
     * @test 
     * */
    public function validaciones_crear_null_test(){
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/mesas')
                ->post('/mesas',[
                    'nombre' => 'Mesa',
                    'numero' => ''])
                ->assertRedirect('/mesas')
                ->assertSessionHasErrors(['numero']);
            
            $this->assertDatabaseMissing('users',[
                'nombre' => 'Mesa '
            ]);
    }
    /**
     * @test 
     * */
    public function validaciones_crear_max50_test(){
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/mesas')
                ->post('/mesas',[
                    'nombre' => 'Mesa',
                    'numero' => '51'])
                ->assertRedirect('/mesas')
                ->assertSessionHasErrors(['numero']);
            
            $this->assertDatabaseMissing('users',[
                'nombre' => 'Mesa 51'
            ]);
    }
    /**
     * @test
     */
    public function Actualizar_mesa(){
        
        //$this->withoutExceptionHandling();
        
        $Mesa = User::find(4);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from('/mesas')
            ->put("/mesas/$Mesa->id",[
                'nombre' => 'Mesa',
                'numero' => '10',
                'username' => 'Mesa10'
            ])->assertRedirect('/mesas');
        
        $this->assertDatabaseHas('users',[
            'nombre' => 'Mesa 10'
        ]);
    }
    /**
     * @test
     */
    public function Actualizar_mesa_username_con_espacios(){
        
        //$this->withoutExceptionHandling();
        
        $Mesa = User::find(4);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from('/mesas')
            ->put("/mesas/$Mesa->id",[
                'nombre' => 'Mesa',
                'numero' => '10',
                'username' => 'Mesa 10'
            ])->assertRedirect('/mesas');
        
        $this->assertDatabaseMissing('users',[
            'nombre' => 'Mesa 10',
            'username' => 'Mesa 10'
        ]);
    }
    /**
     * @test
     */
    public function Actualizar_mesa_username_vacio(){
        
        //$this->withoutExceptionHandling();
        
        $Mesa = User::find(4);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from('/mesas')
            ->put("/mesas/$Mesa->id",[
                'nombre' => 'Mesa',
                'numero' => '10',
                'username' => ''
            ])->assertRedirect('/mesas');
        
        $this->assertDatabaseMissing('users',[
            'nombre' => 'Mesa 10',
            'username' => ''
        ]);
    }
}
