<?php

namespace Tests\Browser;

use Faker\Factory as Faker;
use App\Model\User;
use App\Model\Cliente;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CLienteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @group clientescreate
     * @return void
     */
     public function testCreateCliente()
     {
         $faker = Faker::create();
         $this->browse(function ($browser) use ($faker) {
             $browser->loginAs(User::find(1))//nos autenticamos como administrador
                     ->visit('/clientes/create')
                     ->type('nombre',$faker->unique()->text(30))
                     ->type('nit',$faker->numberBetween($min = 11111111, $max = 99999999))
                     ->type('telefono','4'.$faker->numberBetween($min = 000000, $max = 999999))
                     ->type('direccion',$faker->sentence(4))

                     ->press('crear')
                     ->assertSee('Nuevo Cliente Registrado')
                     ->logout();                    
         });
     }
     /**
     * A Dusk test example.
     *
     * @group clientesupadate
     *
     */
     public function testUpdateCliente()
    {
        //$cliente = cliente::find(1);
        $faker = Faker::create();
        $this->browse(function ($browser) use ($faker) {
            $browser->loginAs(User::find(1))//nos autenticamos como administrador
                    ->visit('/clientes/1/edit')

                    ->type('nombre',$faker->unique()->text(30))
                    ->type('nit',$faker->unique()->numberBetween($min = 11111111, $max = 99999999))
                    ->type('telefono','4'. $faker->numberBetween($min = 000000, $max = 999999))
                    ->type('direccion',$faker->sentence(4))

                    ->press('actualizar')
                    ->assertSee('La Lista de Clientes ha sido Actualizada');
        });
    }
    
}
