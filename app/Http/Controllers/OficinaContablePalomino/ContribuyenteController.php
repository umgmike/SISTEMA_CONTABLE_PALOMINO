<?php

namespace App\Http\Controllers\OficinaContablePalomino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OficinaContablePalomino\Genero;
use App\Models\OficinaContablePalomino\Contribuyente;
use Alert;

class ContribuyenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = Genero::all();
        return view('pages.empresas.contribuyente.create', compact('gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $registro = new Contribuyente();
        $registro->nit = $request->nit;
        $registro->nombre = $request->nombre;
        $registro->apellido = $request->apellido;
        $registro->telefono = $request->telefono;
        $registro->id_genero = $request->id_genero;
         $registro->fecha_nacimiento = $request->fecha_nacimiento;
        $registro->save();
        toast('Contribuyente: '. $registro->nombre.' '. $registro->apellido.' '. 'creado con éxito','success')->timerProgressBar()->autoClose(4500);
        return redirect()->route('page.empresas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
