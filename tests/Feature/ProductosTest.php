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
    /**
     * @test
     */

    public function crear_producto_validacion_precio_negativo(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => -12.0,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['precio']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => -12.0,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }

    /**
     * @test
     */

    public function crear_producto_validacion_precio_valor_cero(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 0,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['precio']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 0,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_precio_min(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 0.00001,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['precio']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 0.00001,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_precio_valor_max(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 9999999999,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima para comer',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['precio']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 9999999999,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima para comer'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_Descripcion_valor_null(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => null,
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['descripcion']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => null
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_Descripcion_valor_min4(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Ric',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['descripcion']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Ric'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_Descripcion_valor_max255(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                    estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                    estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                    estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                    estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['descripcion']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres
                estamos provando la descripcion en si su tamano de letras que deberia tener que no tiene que exeder de los 255 caracteres'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_id_categoria_null(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => null,
                    'descripcion' => 'Riquisima',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['categoria_id']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => null,
                'descripcion' => 'Riquisima'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_id_categoria_valor_exedido(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 10000,
                    'descripcion' => 'Riquisima',
                    'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['categoria_id']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 10000,
                'descripcion' => 'Riquisima'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_foto_null(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima',
                    'foto' => null
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['foto']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima'
            ]);
    }
    /**
     * @test
     */

    public function crear_producto_validacion_foto_no_imagen(){
        
        //$this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
                ->from('/productos/create')
                ->post('/productos', [
                    'nombre' => 'milanesa',
                    'estado_id' => true,
                    'precio' => 23.00,
                    'categoria_id' => 1,
                    'descripcion' => 'Riquisima',
                    'foto' => UploadedFile::fake()->image('/storage/fotosTest/horarios.pdf')
                    ])->assertRedirect('/productos/create')
                    ->assertSessionHasErrors(['foto']);
            
            $this->assertDatabaseMissing('producto',[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 23.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima'
            ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto(){
        
        $this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 50.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima',
                'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
            ])->assertRedirect("/productos");
        
        $this->assertDatabaseHas('producto',[
            'nombre' => 'milanesa',
            'estado_id' => true
        ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto_validacion_nombre_null(){
        
        //$this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from("/productos/{$producto->producto_id}/edit")
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => null,
                'estado_id' => true,
                'precio' => 50.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima',
                'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
            ])->assertRedirect("/productos/{$producto->producto_id}/edit")
            ->assertSessionHasErrors(['nombre']);
        
        $this->assertDatabaseMissing('producto',[
            'nombre' => null,
            'estado_id' => true
        ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto_validacion_nombre_simbolo(){
        
        //$this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from("/productos/{$producto->producto_id}/edit")
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => 'milanesa][][',
                'estado_id' => true,
                'precio' => 50.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima',
                'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
            ])->assertRedirect("/productos/{$producto->producto_id}/edit")
            ->assertSessionHasErrors(['nombre']);
        
        $this->assertDatabaseMissing('producto',[
            'nombre' => 'milanesa][][',
            'estado_id' => true
        ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto_validacion_nombre_min3(){
        
        //$this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from("/productos/{$producto->producto_id}/edit")
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => 'm',
                'estado_id' => true,
                'precio' => 50.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima',
                'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
            ])->assertRedirect("/productos/{$producto->producto_id}/edit")
            ->assertSessionHasErrors(['nombre']);
        
        $this->assertDatabaseMissing('producto',[
            'nombre' => 'm',
            'estado_id' => true
        ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto_validacion_nombre_max80(){
        
        //$this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from("/productos/{$producto->producto_id}/edit")
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => 'prueba para controlar maximo 80 caracteres prueba para controlar maximo 80 caracteres prueba para controlar maximo 80 caracteres',
                'estado_id' => true,
                'precio' => 50.00,
                'categoria_id' => 1,
                'descripcion' => 'Riquisima',
                'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
            ])->assertRedirect("/productos/{$producto->producto_id}/edit")
            ->assertSessionHasErrors(['nombre']);
        
        $this->assertDatabaseMissing('producto',[
            'nombre' => 'prueba para controlar maximo 80 caracteres prueba para controlar maximo 80 caracteres prueba para controlar maximo 80 caracteres',
            'estado_id' => true
        ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto_validacion_precio_descripcion(){
        
        //$this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from("/productos/{$producto->producto_id}/edit")
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => -50.00,
                'categoria_id' => 1,
                'descripcion' => 'prueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcion
                prueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcion
                prueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcion
                prueba para controlar el maximo de caracteres en descripcion',
                'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
            ])->assertRedirect("/productos/{$producto->producto_id}/edit")
            ->assertSessionHasErrors(['precio','descripcion']);
        
        $this->assertDatabaseMissing('producto',[
            'nombre' => 'milanesa',
            'estado_id' => true,
            'precio' => -50.00,
            'descripcion' => 'prueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcion
            prueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcion
            prueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcionprueba para controlar el maximo de caracteres en descripcion
            prueba para controlar el maximo de caracteres en descripcion'
        ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto_validacion_precioMax_descripcionMin(){
        
        //$this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from("/productos/{$producto->producto_id}/edit")
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 5050505050.00,
                'categoria_id' => 1,
                'descripcion' => 'Ri',
                'foto' => UploadedFile::fake()->image('/storage/fotos/a.jpg')
            ])->assertRedirect("/productos/{$producto->producto_id}/edit")
            ->assertSessionHasErrors(['precio','descripcion']);
        
        $this->assertDatabaseMissing('producto',[
            'nombre' => 'milanesa',
            'estado_id' => true,
            'precio' => 5050505050.00,
            'categoria_id' => 1,
            'descripcion' => 'Ri'
        ]);
    }
    /**
     * @test
     */

    public function Actualizar_producto_validacion_tipo_foto_categoria_null(){
        
        //$this->withoutExceptionHandling();
        
        $producto = Producto::find(1);
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'admin'])
            ->from("/productos/{$producto->producto_id}/edit")
            ->put("/productos/{$producto->producto_id}",[
                'nombre' => 'milanesa',
                'estado_id' => true,
                'precio' => 50.00,
                'categoria_id' => null,
                'descripcion' => 'Riquisima',
                'foto' => UploadedFile::fake()->image('/storage/fotosTest/horarios.pdf')
            ])->assertRedirect("/productos/{$producto->producto_id}/edit")
            ->assertSessionHasErrors(['categoria_id','foto']);
        
        $this->assertDatabaseMissing('producto',[
            'nombre' => 'milanesa',
            'estado_id' => true,
            'precio' => 50.00,
            'categoria_id' => null,
            'descripcion' => 'Riquisima'
        ]);
    }
}
