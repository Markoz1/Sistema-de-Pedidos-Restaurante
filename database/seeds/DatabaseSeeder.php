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
        DB::table('categoria')->truncate();
        DB::table('producto')->truncate();
        DB::table('users')->truncate();
        DB::table('cliente')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(MesasSeeder::class);
        $this->call(UserSeeder::class); 
        $this->call(ClienteSeeder::class);               
    }
}
