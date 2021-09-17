<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\Categoria; 

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
        	'codigo' => 1,
        	'nombre' => 'Activo'
        ]);

        Categoria::create([
        	'codigo' => 2,
        	'nombre' => 'Pasivo'
        ]);

        Categoria::create([
        	'codigo' => 3,
        	'nombre' => 'Patrimonio neto'
        ]);

        Categoria::create([
            'codigo' => 4,
            'nombre' => 'Ingresos netos'
        ]);

        Categoria::create([
            'codigo' => 5,
            'nombre' => 'Costo de ventas'
        ]);

        Categoria::create([
            'codigo' => 6,
            'nombre' => 'Gastos de operacion'
        ]);

        Categoria::create([
            'codigo' => 7,
            'nombre' => 'Productos'
        ]);

        Categoria::create([
            'codigo' => 8,
            'nombre' => 'Gastos financieros'
        ]);

        Categoria::create([
            'codigo' => 9,
            'nombre' => 'Gastos no deducibles'
        ]);
    }
    }
}
