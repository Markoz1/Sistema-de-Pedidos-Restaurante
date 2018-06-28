<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\User;


class CategoriasTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @test
     */
    public function acceder_a_categorias_como_administrador()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
             ->get('/categorias')
             ->assertStatus(200)
             ->assertSee('Categorias');          
    }
    /**
     * @test
     */
    public function crear_nueva_categoria(){
        
        $this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->json('POST', '/categorias', [
                    'nombreCategoria' => 'ensalada',
                    'estado' => true
                    ])->assertRedirect('/categorias');
            
            $this->assertDatabaseHas('categoria',[
                'nombre' => 'ensalada',
                'estado' => true
            ]);
    }


}
