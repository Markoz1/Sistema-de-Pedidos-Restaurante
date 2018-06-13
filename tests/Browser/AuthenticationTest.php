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
                    ->type('password', 'secret')
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
                    ->type('password', 'secret')
                    ->press('ingresar')
                    ->assertPathIs('/menu');
        });
    }
}