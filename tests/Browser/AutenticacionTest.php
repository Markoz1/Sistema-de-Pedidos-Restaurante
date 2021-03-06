<?php

namespace Tests\Browser;

use App\Model\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AutenticacionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUsuarioAutorizado()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('username', $user->username)
                    ->type('password', '123456')
                    ->press('ingresar')
                    ->assertPathIs('/')
                    ->logout();
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUsuarioMesa()
    {
        $user = User::find(4);
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('username', $user->username)
                    ->type('password', 'Mesa1')
                    ->press('ingresar')
                    ->assertPathIs('/menu');
        });
    }
}
