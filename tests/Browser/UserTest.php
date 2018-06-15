<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\WebDriverBy;
use App\Model\User;

class UserTest extends DuskTestCase
{
    /**
     * @group userc
     */
    public function testCreateNewUser()
    {    
        $user = factory(User::class)->create();
        
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->maximize();           
            $browser->loginAs(User::find(1))
                ->visit('/users');
                // ->clickLink('Usuarios')
                $browser->clickLink('Nuevo Usuario')
                ->assertPathIs('/users/create')
                ->assertSee('Nuevo Usuario')
                ->type('nombre', 'Julio Valdez')
                ->type('phone', '70790879')
                ->type('direccion', 'Av. Oquendo #1302')
                ->type('username', 'julio.valdez3')
                ->type('ci', '89876533');
                $browser->attach('foto',public_path('/uploads/avatars/1528702510.jpg'));
                $browser->keys('#role_id', ['{ENTER}','Adminstrador']);
                $browser->press('Crear')
                ->assertSee('Se creó un nuevo usuario')
                ->assertPathIs('/users')
                ->pause(3000);
                $browser->visit('/users?page=2');
                $browser->pause(7000);
        });
    }

    /**
     * @group userc
     */
    public function testCreateNewUser2()
    {    
        $user = factory(User::class)->create();
        
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->maximize();           
            $browser->loginAs(User::find(1))
                ->visit('/users');
                // ->clickLink('Usuarios')
                $browser->clickLink('Nuevo Usuario')
                ->assertPathIs('/users/create')
                ->assertSee('Nuevo Usuario')
                ->type('nombre', 'Roberto Lanza')
                ->type('phone', '70980767')
                ->type('direccion', 'Av. Oquendo #1302')
                ->type('username', 'robert_23')
                ->type('ci', '56788765');
                $browser->attach('foto',public_path('/uploads/avatars/1528702535.jpeg'));
                $browser->keys('#role_id', ['{ENTER}','Cajero']);
                $browser->press('Crear')
                ->assertSee('Se creó un nuevo usuario')
                ->assertPathIs('/users')
                ->pause(3000);
                $browser->visit('/users?page=4');
                $browser->pause(7000);
        });
    }

    /**
     * @group useri
     */
    public function testCreateIncorrectNewUser()
    {    
        $user = factory(User::class)->create();
        
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->maximize();           
            $browser->loginAs(User::find(1))
                ->visit('/users');
                // ->clickLink('Usuarios')
                $browser->clickLink('Nuevo Usuario')
                ->assertPathIs('/users/create')
                ->assertSee('Nuevo Usuario')
                ->type('nombre', 'Lucia Ramirez#')
                ->type('phone', '60890879')
                ->type('direccion', 'Av. America #108')
                ->type('username', 'lucia.ramirez')
                ->type('ci', '89876559')
                ->keys('#role_id', ['{ENTER}','Cajero']);
                $browser->press('Crear')
                ->assertSee('El campo nombre sólo puede contener letras, números, espacios y puntos.');
                $browser->pause(7000);
        });
    }

    /**
     * @group useri
     */
    public function testCreateIncorrectNewUser2()
    {    
        $user = factory(User::class)->create();
        
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->maximize();           
            $browser->loginAs(User::find(1))
                ->visit('/users');
                // ->clickLink('Usuarios')
                $browser->clickLink('Nuevo Usuario')
                ->assertPathIs('/users/create')
                ->assertSee('Nuevo Usuario')
                ->type('nombre', 'Lucia Ramirez')
                ->type('phone', '60890879')
                ->type('direccion', 'Av. America #108')
                ->type('username', 'lucia.ramirez')
                ->type('ci', '')
                ->keys('#role_id', ['{ENTER}','Cajero']);
                $browser->press('Crear')
                ->assertSee('El campo ci es obligatorio.');
                $browser->pause(4000);
        });
    }

    /**
     * @group useri
     */
    public function testCreateIncorrectNewUser3()
    {    
        $user = factory(User::class)->create();
        
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->maximize();           
            $browser->loginAs(User::find(1))
                ->visit('/users');
                // ->clickLink('Usuarios')
                $browser->clickLink('Nuevo Usuario')
                ->assertPathIs('/users/create')
                ->assertSee('Nuevo Usuario')
                ->type('nombre', 'Lucia Ramirez')
                ->type('phone', '60890879')
                ->type('direccion', 'Av. America #108')
                ->type('username', 'lucia.ram')
                ->type('ci', '89876533')
                ->keys('#role_id', ['{ENTER}','Cocinero']);
                $browser->press('Crear')
                ->assertSee('El valor del campo ci ya está en uso.')
                ->pause(4000);
        });
    }
}
