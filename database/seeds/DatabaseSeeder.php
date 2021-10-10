<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GeneroTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(ContribuyenteTableSeeder::class);
        $this->call(RegimenesTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(RelBitacoraTableSeeder::class);
    }
}
