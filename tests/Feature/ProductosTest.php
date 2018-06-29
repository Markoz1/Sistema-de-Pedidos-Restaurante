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
}
