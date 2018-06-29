<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\User;
use App\Model\Categoria;

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

    /**
     * @test 
     * */
    public function validaciones_crear_con_simbolo_test(){
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/categorias')
                ->post('/categorias',[
                    'nombreCategoria' => 'en_salada',
                    'estado' => true])
                ->assertRedirect('/categorias')
                ->assertSessionHasErrors(['nombreCategoria']);
            
            $this->assertDatabaseMissing('categoria',[
                'nombre' => 'en_salada',
                'estado' => true
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
                ->from('/categorias')
                ->post('/categorias',[
                    'nombreCategoria' => '',
                    'estado' => true])
                ->assertRedirect('/categorias')
                ->assertSessionHasErrors(['nombreCategoria']);
            
            $this->assertDatabaseMissing('categoria',[
                'nombre' => '',
                'estado' => true
            ]);
    }
    /**
     * @test 
     * */
    public function validaciones_crear_min3_test(){
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/categorias')
                ->post('/categorias',[
                    'nombreCategoria' => 'as',
                    'estado' => true])
                ->assertRedirect('/categorias')
                ->assertSessionHasErrors(['nombreCategoria']);
            
            $this->assertDatabaseMissing('categoria',[
                'nombre' => 'as',
                'estado' => true
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
                ->from('/categorias')
                ->post('/categorias',[
                    'nombreCategoria' => 'lugar donde se muestran los productos del restaurante',
                    'estado' => true])
                ->assertRedirect('/categorias')
                ->assertSessionHasErrors(['nombreCategoria']);
            
            $this->assertDatabaseMissing('categoria',[
                'nombre' => 'lugar donde se muestran los productos del restaurante',
                'estado' => true
            ]);
    }
    /**
     * @test
     */

    public function Actualizar_categoria(){
        
        //$this->withoutExceptionHandling();
        
        $categoria = Categoria::find(5);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->put("/categorias/{$categoria->categoria_id}",[
                'nombreCategoria' => 'dulces',
                'estado' => true
            ])->assertRedirect('categorias');
        
        $this->assertDatabaseHas('categoria',[
            'nombre' => 'dulces',
            'estado' => true
        ]);
    }
<<<<<<< HEAD
    /**
     * @test
     */

    public function Actualizar_categoria_nombre_null(){
        
        //$this->withoutExceptionHandling();
        
        $categoria = Categoria::find(5);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from('/categorias')
            ->put("/categorias/{$categoria->categoria_id}",[
                'nombreCategoria' => '',
                'estado' => true
            ])->assertRedirect('categorias');
        
        $this->assertDatabaseMissing('categoria',[
            'nombre' => '',
            'estado' => true
        ]);
    }

    public function Actualizar_categoria_nombre_simbolos(){
        
        //$this->withoutExceptionHandling();
        
        $categoria = Categoria::find(5);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from('/categorias')
            ->put("/categorias/{$categoria->categoria_id}",[
                'nombreCategoria' => '[][][][]',
                'estado' => true
            ])->assertRedirect('categorias');
        
        $this->assertDatabaseMissing('categoria',[
            'nombre' => '[][][][]',
            'estado' => true
        ]);
    }

    public function Actualizar_categoria_nombre_min3(){
        
        //$this->withoutExceptionHandling();
        
        $categoria = Categoria::find(5);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from('/categorias')
            ->put("/categorias/{$categoria->categoria_id}",[
                'nombreCategoria' => 'ws',
                'estado' => true
            ])->assertRedirect('categorias');
        
        $this->assertDatabaseMissing('categoria',[
            'nombre' => 'ws',
            'estado' => true
        ]);
    }

    public function Actualizar_categoria_nombre_max50(){
        
        //$this->withoutExceptionHandling();
        
        $categoria = Categoria::find(5);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from('/categorias')
            ->put("/categorias/{$categoria->categoria_id}",[
                'nombreCategoria' => 'lugar donde se muestran los productos del restaurante',
                'estado' => true
            ])->assertRedirect('categorias');
        
        $this->assertDatabaseMissing('categoria',[
            'nombre' => 'lugar donde se muestran los productos del restaurante',
            'estado' => true
        ]);
    }
=======
>>>>>>> 9819167750f280b8ee01c00f3ed3269570bb90f9
}
