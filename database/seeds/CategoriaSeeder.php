<?php

use App\Model\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Plato Principal'
        ]);
        Categoria::create([
            'nombre' => 'Postre'
        ]);
        Categoria::create([
            'nombre' => 'Bebida'
        ]);
    }
}
