<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\Genero;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create([
        	'tipo_genero' => 'Masculino', 
        ]);

        Genero::create([
        	'tipo_genero' => 'Femenino', 
        ]);
    }
}
