<?php

namespace Tests\Feature;

use App\Model\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutenticacionTest extends TestCase
{
    /**
     * A basic test example.
     * 
     * @test
     */
    public function acceder_como_administrador()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'administrador'])
             ->get('/')
             ->assertStatus(200)
             ->assertSee('Administrador');         
    }
    /**
     * A basic test example.
     * 
     * @test
     */
    public function acceder_como_cocinero()
    {
        $user = User::find(2);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'cocinero'])
             ->get('/')
             ->assertStatus(200)
             ->assertSee('Cocinero');         
    }
    /**
     * A basic test example.
     * 
     * @test
     */
    public function acceder_como_cajero()
    {
        $user = User::find(3);
        $response = $this->actingAs($user)
            ->withSession(['User' => 'cajero'])
             ->get('/')
             ->assertStatus(200)
             ->assertSee('Cajero');         
    }
}
