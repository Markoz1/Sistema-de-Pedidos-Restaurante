<?php

namespace Tests\Browser;

use Faker\Factory as Faker;
use App\Model\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MesaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mesas
     * @return void
     */
    public function testCreateMesa()
    {
        $faker = Faker::create();
        $mesas = User::where('role_id', 5)->get();
        $this->browse(function ($browser) use ($faker, $mesas) {
            $browser->loginAs(User::find(1))//nos autenticamos como administrador
                    ->visit('/mesas')
                    ->click('#nueva_mesa')
                    ->type('numero',$faker->numberBetween($min = $mesas->last()->numero(), $max = 50))//ingresamos un numero valido
                    ->press('crear')
                    ->assertSee('Se creo una nueva Mesa');
        });
    }
    /**
     * A Dusk test example.
     * @group mesas
     * @return void
     */
    public function testUpdateMesa()
    {
        $faker = Faker::create();
        $password = $faker->password;
        $this->browse(function ($browser) use ($faker, $password) {
            $browser->visit('/mesas')
                    ->click('#edit4')
                    ->type('username',$faker->regexify('/^[a-zA-Z0-9_-]*$/'))
                    ->type('password',$password)
                    ->type('password_confirmation',$password)
                    ->press('actualizar')
                    ->assertSee('La Mesa se ha modificado');
        });
    }
}
