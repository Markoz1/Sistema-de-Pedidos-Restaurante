<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function acceder_a_categorias_como_administrador()
    {
        $response = $this->withSession(['User' => 'admin'])
             ->get('/categorias')
             ->assertStatus(200)
             ->assertSee('Categorias');          
    }
}
