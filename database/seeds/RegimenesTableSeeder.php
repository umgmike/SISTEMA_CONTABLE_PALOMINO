<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\Regimen;

class RegimenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regimen::create([
        	'nombre_regimen' => 'Pequeño Contribuyente',
        	'descripcion' => 'Persona registrada y asignada al libro de compras y ventas'
        ]);

        Regimen::create([
        	'nombre_regimen' => 'Contribuyente Normal',
        	'descripcion' => 'Persona registrada y asignada en los 5 libros contables'
        ]);
    }
}
