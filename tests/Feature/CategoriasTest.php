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
    public function ingresar_a_categorias()
    {
        $this->get('/categorias')
            ->assertStatus(200)
            ->assertSee('Cuentas');

    }
}
