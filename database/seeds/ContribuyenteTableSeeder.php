<?php

use Illuminate\Database\Seeder;
use App\Models\OficinaContablePalomino\Contribuyente;

class ContribuyenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Contribuyente::create([
        	'nit' => '12736458',
        	'nombre' => 'BuenaVentura',
        	'apellido' => 'Rosales',
        	'telefono' => '12322345',
        	'genero' => 'M',
        	'fecha_nacimiento' => '1995-09-15'
        ]);

        Contribuyente::create([
        	'nit' => '2345321',
        	'nombre' => 'Maria',
        	'apellido' => 'Jacinto',
        	'telefono' => '87364827',
        	'genero' => 'F',
        	'fecha_nacimiento' => '1995-09-11'
        ]);

        Contribuyente::create([
        	'nit' => '09873648',
        	'nombre' => 'Juan Pedro',
        	'apellido' => 'Solares',
        	'telefono' => '98763542',
        	'genero' => 'M',
        	'fecha_nacimiento' => '1993-09-11'
        ]);


        Contribuyente::create([
        	'nit' => '99828112',
        	'nombre' => 'Mario',
        	'apellido' => 'Morales',
        	'telefono' => '12342345',
        	'genero' => 'M',
        	'fecha_nacimiento' => '1995-09-11'
        ]);

        Contribuyente::create([
        	'nit' => '87878654',
        	'nombre' => 'Marta',
        	'apellido' => 'Goes',
        	'telefono' => '90908765',
        	'genero' => 'M',
        	'fecha_nacimiento' => '1991-09-10'
        ]);

        Contribuyente::create([
        	'nit' => '16253748',
        	'nombre' => 'Martina',
        	'apellido' => 'Juarez',
        	'telefono' => '25364738',
        	'genero' => 'F',
        	'fecha_nacimiento' => '1998-09-10'
        ]);
    }
}
