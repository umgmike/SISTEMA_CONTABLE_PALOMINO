<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\Empresa;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Empresa::create([
        	'id_regimen' => 1, 
        	'nit' => '23232323',
            'id_contribuyente' => 1,
            'anyo_contable' => 2021,
        	'nombre_establecimiento' => 'Almacen Las Brigadas', 
        	'descripcion' => 'Empresa de venta de ropa para dama y caballero'
        ]);

        Empresa::create([
            'id_regimen' => 1, 
            'nit' => '23232322',
            'id_contribuyente' => 2,
            'anyo_contable' => 2021,
            'nombre_establecimiento' => 'Almacen Los 3 Zapotecos', 
            'descripcion' => 'Empresa de venta de zapatos para dama y caballero'
        ]);

        Empresa::create([
            'id_regimen' => 1, 
            'nit' => '23232324',
            'id_contribuyente' => 3,
            'anyo_contable' => 2021,
            'nombre_establecimiento' => 'Almacen los Verdes ', 
            'descripcion' => 'Empresa de venta de tenis para dama y caballero'
        ]);

        Empresa::create([
            'id_regimen' => 1, 
            'nit' => '23232321',
            'id_contribuyente' => 4,
            'anyo_contable' => 2021,
            'nombre_establecimiento' => 'Almacen Los 2 Pinos', 
            'descripcion' => 'Empresa de venta de mochilas para dama y caballero'
        ]);

    }
}
