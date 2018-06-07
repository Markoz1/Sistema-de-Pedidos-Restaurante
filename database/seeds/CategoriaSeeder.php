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
            'nombre' => 'Plato Principal',
            'estado' => true
        ]);
        Categoria::create([
            'nombre' => 'Postre',
            'estado' => true
        ]);
        Categoria::create([
            'nombre' => 'Bebida',
            'estado' => true
        ]);
        Categoria::create([
            'nombre' => 'Combos',
            'estado' => false
        ]);
    }
}
