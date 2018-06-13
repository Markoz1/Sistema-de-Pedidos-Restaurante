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
     * @group user
     */
    public function testCreateNewUser()
    {
       $user = factory(User::class)->create([
            'nombre' => 'Admin',
            'phone' => '70798765',
            'direccion' => 'Av. Oquendo 1232',
            'username' => 'admin',
            'foto' => '/uploads/avatars/default.jpg',
            // 'ci' => $faker->unique()->randomNumber,
            'ci' => '1234567',
            'estado' => 1,
            'role_id' => 1,
            'password' => bcrypt('123456'), // secret
            'remember_token' => str_random(10)
            ]
        );

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('username', 'admin')
                    ->type('password', '123456')
                    ->press('Ingresar')
                    ->assertPathIs('/')
                    ->clickLink('Nuevo Usuario')
                    // ->press('Nuevo Usuario')
                    ->assertPathIs('/users/create')
                    ->assertSee('Nuevo Usuario')
                    ->type('nombre', 'Julio Valdez')
                    ->type('phone', '70790876')
                    ->type('direccion', 'Av. Oquendo #1302')
                    ->type('username', 'jose.valdez')
                    ->type('ci', '89876554')
                    // ->type('foto', '123456')
                    // ->value('@role_id', '1')
                    // ->value('#role_id', '1')
                    ->select('role_id', '1')->select('role_id', '2')
                    ->check ("input:checkbox[name='estado[]'][value='1']")
                    ->assertSee('Se creó un nuevo usuario')
                    ->logout();
        });
    }

    /**
     * Resolve the element for a given tag by text.
     */
    protected function findTagContaingText($tag, $text)
    {
        return $this->driver->findElement(
            WebDriverBy::xpath("//".$tag."[contains(text(), '".$text."')]") 
        );
    }

    public function value($selector, $value = null)
    {
        if (! $value) {
            return $this->resolver->findOrFail($selector)->getAttribute('value');
        }

        $selector = $this->resolver->format($selector);

        $this->driver->executeScript(
            "document.querySelector('{$selector}').value = '{$value}';"
        );

        return $this;
    }
}
