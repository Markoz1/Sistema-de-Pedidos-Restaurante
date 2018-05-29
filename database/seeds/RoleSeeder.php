<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'nombre' => 'Aministrador'
        ]);
        Role::create([
            'nombre' => 'Cocinero'
        ]);
        Role::create([
            'nombre' => 'Mesero'
        ]);
        Role::create([
            'nombre' => 'Cajero'
        ]);
        Role::create([
            'nombre' => 'Mesa'
        ]);
    }
}
