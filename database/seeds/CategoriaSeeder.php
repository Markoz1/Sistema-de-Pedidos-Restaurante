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
            'nombre' => 'categoria1'
        ]);
        Categoria::create([
            'nombre' => 'categoria2'
        ]);
        Categoria::create([
            'nombre' => 'categoria3'
        ]);
        Categoria::create([
            'nombre' => 'categoria4'
        ]);
    }
}
