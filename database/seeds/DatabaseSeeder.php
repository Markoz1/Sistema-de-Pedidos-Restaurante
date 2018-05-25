<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('Categoria')->truncate();
        DB::table('producto')->truncate();
        DB::table('cliente')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ClienteSeeder::class);
    }
}
