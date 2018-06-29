<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\User;
use App\Model\Producto;

class ProductosTest extends TestCase
{
    /**
     * @test
     */
    public function crear_nuevo_producto(){
        
        $this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->json('POST', '/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos');
            
            $this->assertDatabaseHas('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_nombre_null(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => '',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['nombre']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => '',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_nombre_simbolos(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => '[][]',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['nombre']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => '[][]',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_nombre_min3(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'as',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['nombre']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'as',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_nombre_max80(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'Este es un nuevo producto que creamos con los des cocineros se llama pique a lo macho con ajis super picantes',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['nombre']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'Este es un nuevo producto que creamos con los des cocineros se llama pique a lo macho con ajis super picantes',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_precio_null(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => null,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['precio']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => null,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
}
