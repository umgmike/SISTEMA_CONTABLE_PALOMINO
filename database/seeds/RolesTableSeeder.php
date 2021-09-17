<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\Rol;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
        	'nombre_rol' => 'Administrador',
        	'descripcion' => 'Control del 100% del sistema'
        ]);

        Rol::create([
        	'nombre_rol' => 'Auxiliar Contable',
        	'descripcion' => 'Control del 50% del sistema'
        ]);
    }
}
