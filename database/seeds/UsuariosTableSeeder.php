<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\Usuario;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
        	'id_rol' => 1, 
            'nombre' => 'Ana Steffanny',
        	'apellido' => 'Jacinto Guarcas',
            'nit' => '8019668-3',
        	'usuario' => 'Steffanny',
        	'password' => bcrypt('123'),
        	'telefono' => '4080-2648',
        ]);

        Usuario::create([
        	'id_rol' => 1, 
            'nombre' => 'Mardo',
        	'apellido' => 'Palomino',
            'nit' => '8019668-4',
        	'usuario' => 'Mardo',
        	'password' => bcrypt('123'),
        	'telefono' => '4080-1111',
        ]);
    }
}