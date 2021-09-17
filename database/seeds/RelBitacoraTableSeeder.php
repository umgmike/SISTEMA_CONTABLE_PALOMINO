<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\RelBitacora;

class RelBitacoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 1
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 2
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 3
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 4
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 5
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 6
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 7
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 8
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 9
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 10
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 11
        ]);

        RelBitacora::create([
            'id_usuario' => 1,
        	'partida' => 12
        ]);
    }
}
